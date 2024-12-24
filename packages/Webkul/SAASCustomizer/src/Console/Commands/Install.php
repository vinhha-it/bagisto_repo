<?php

namespace Webkul\SAASCustomizer\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Event;
use Webkul\SAASCustomizer\Database\Seeders\DatabaseSeeder as SaasDatabaseSeeder;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\password;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'saas:install
    { --skip-env-check : Skip env check. }
    { --skip-agent-creation : Skip agent creation. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will install Bagisto, Saas Extension, and generates one super user for the system.';

    /**
     * Locales list.
     *
     * @var array
     */
    protected $locales = [
        'ar'    => 'Arabic',
        'bn'    => 'Bengali',
        'de'    => 'German',
        'en'    => 'English',
        'es'    => 'Spanish',
        'fa'    => 'Persian',
        'fr'    => 'French',
        'he'    => 'Hebrew',
        'hi_IN' => 'Hindi',
        'it'    => 'Italian',
        'ja'    => 'Japanese',
        'nl'    => 'Dutch',
        'pl'    => 'Polish',
        'pt_BR' => 'Brazilian Portuguese',
        'ru'    => 'Russian',
        'sin'   => 'Sinhala',
        'tr'    => 'Turkish',
        'uk'    => 'Ukrainian',
        'zh_CN' => 'Chinese',
    ];

    /**
     * Currencies list.
     *
     * @var array
     */
    protected $currencies = [
        'AED' => 'United Arab Emirates Dirham',
        'ARS' => 'Argentine Peso',
        'AUD' => 'Australian Dollar',
        'BDT' => 'Bangladeshi Taka',
        'BRL' => 'Brazilian Real',
        'CAD' => 'Canadian Dollar',
        'CHF' => 'Swiss Franc',
        'CLP' => 'Chilean Peso',
        'CNY' => 'Chinese Yuan',
        'COP' => 'Colombian Peso',
        'CZK' => 'Czech Koruna',
        'DKK' => 'Danish Krone',
        'DZD' => 'Algerian Dinar',
        'EGP' => 'Egyptian Pound',
        'EUR' => 'Euro',
        'FJD' => 'Fijian Dollar',
        'GBP' => 'British Pound Sterling',
        'HKD' => 'Hong Kong Dollar',
        'HUF' => 'Hungarian Forint',
        'IDR' => 'Indonesian Rupiah',
        'ILS' => 'Israeli New Shekel',
        'INR' => 'Indian Rupee',
        'JOD' => 'Jordanian Dinar',
        'JPY' => 'Japanese Yen',
        'KRW' => 'South Korean Won',
        'KWD' => 'Kuwaiti Dinar',
        'KZT' => 'Kazakhstani Tenge',
        'LBP' => 'Lebanese Pound',
        'LKR' => 'Sri Lankan Rupee',
        'LYD' => 'Libyan Dinar',
        'MAD' => 'Moroccan Dirham',
        'MUR' => 'Mauritian Rupee',
        'MXN' => 'Mexican Peso',
        'MYR' => 'Malaysian Ringgit',
        'NGN' => 'Nigerian Naira',
        'NOK' => 'Norwegian Krone',
        'NPR' => 'Nepalese Rupee',
        'NZD' => 'New Zealand Dollar',
        'OMR' => 'Omani Rial',
        'PAB' => 'Panamanian Balboa',
        'PEN' => 'Peruvian Nuevo Sol',
        'PHP' => 'Philippine Peso',
        'PKR' => 'Pakistani Rupee',
        'PLN' => 'Polish Zloty',
        'PYG' => 'Paraguayan Guarani',
        'QAR' => 'Qatari Rial',
        'RON' => 'Romanian Leu',
        'RUB' => 'Russian Ruble',
        'SAR' => 'Saudi Riyal',
        'SEK' => 'Swedish Krona',
        'SGD' => 'Singapore Dollar',
        'THB' => 'Thai Baht',
        'TND' => 'Tunisian Dinar',
        'TRY' => 'Turkish Lira',
        'TWD' => 'New Taiwan Dollar',
        'UAH' => 'Ukrainian Hryvnia',
        'USD' => 'United States Dollar',
        'UZS' => 'Uzbekistani Som',
        'VEF' => 'Venezuelan Bolívar',
        'VND' => 'Vietnamese Dong',
        'XAF' => 'CFA Franc BEAC',
        'XOF' => 'CFA Franc BCEAO',
        'ZAR' => 'South African Rand',
        'ZMW' => 'Zambian Kwacha',
    ];

    /**
     * Does the all sought of lifting required to be performed for
     * generating a super user
     */
    public function handle()
    {
        $applicationDetails = ! $this->option('skip-env-check')
            ? $this->checkForEnvFile()
            : [];

        $this->warn('Step: Generating key...');
        $this->call('key:generate');

        $this->warn('Step: Migrating all tables...');
        $this->call('migrate:fresh');

        $this->warn('Step: Seeding basic data for Bagisto kickstart...');
        $this->info(app(SaasDatabaseSeeder::class)->run([
            'default_locale'     => $applicationDetails['default_locale'] ?? 'en',
            'allowed_locales'    => $applicationDetails['allowed_locales'] ?? ['en'],
            'default_currency'   => $applicationDetails['default_currency'] ?? 'USD',
            'allowed_currencies' => $applicationDetails['allowed_currencies']  ?? ['USD'],
        ]));

        $this->warn('Step: Publishing assets and configurations...');
        $result = shell_exec('php artisan vendor:publish --force --all');
        $this->info($result);

        $this->warn('Step: Linking storage directory...');
        $this->call('storage:link');

        $this->warn('Step: Clearing cached bootstrap files...');
        $this->call('optimize:clear');

        if (! $this->option('skip-agent-creation')) {
            $this->warn('Step: Create agent credentials...');
            $this->createAgentCredentials();
        }
    }

    /**
     *  Checking .env file and if not found then create .env file.
     *
     *  @return ?array
     */
    protected function checkForEnvFile()
    {
        if (! file_exists(base_path('.env'))) {
            $this->info('Creating the environment configuration file.');

            File::copy('.env.example', '.env');
        } else {
            $this->info('Great! your environment configuration file already exists.');
        }

        return $this->createEnvFile();
    }

    /**
     * Create a new .env file. Afterwards, request environment configuration details and set them
     * in the .env file to facilitate the migration to our database.
     *
     * @return ?array
     */
    protected function createEnvFile()
    {
        try {
            $applicationDetails = $this->askForApplicationDetails();

            $this->askForDatabaseDetails();

            return $applicationDetails;
        } catch (\Exception $e) {
            dd($e->getMessage());
            $this->error('Error in creating .env file, please create it manually and then run `php artisan migrate` again.');
        }
    }

    /**
     * Ask for application details.
     *
     * @return void
     */
    protected function askForApplicationDetails()
    {
        $this->updateEnvVariable(
            'APP_NAME',
            'Please enter the <bg=black;fg=white;options=bold;>Application Name (APP_NAME):</>',
            env('APP_NAME', 'Bagisto Saas')
        );

        $this->updateEnvVariable(
            'APP_URL',
            'Please enter the <bg=black;fg=white;options=bold;>Application URL (APP_URL):</>',
            env('APP_URL', 'http://saas.com')
        );

        $this->envUpdate(
            'APP_TIMEZONE',
            date_default_timezone_get()
        );

        $this->info('Your Default Timezone is '.date_default_timezone_get());

        do {
            $allowedLocales = $this->allowedChoice(
                'Please choose <bg=black;fg=white;options=bold;>Super Admin Channel\'s Locales:</>',
                $this->locales,
                ['en' => $this->locales['en']],
                10
            );
        
            if (empty($allowedLocales)) {
                $this->error('At least one locale is required. Please choose again.');
            }
        } while (empty($allowedLocales));

        do {
            $allowedCurrencies = $this->allowedChoice(
                'Please choose <bg=black;fg=white;options=bold;>Super Admin Channel\'s Currencies:</>',
                $this->currencies,
                ['USD' => $this->currencies['USD']],
                10
            );
        
            if (empty($allowedCurrencies)) {
                $this->error('At least one currency is required. Please choose again.');
            }
        } while (empty($allowedCurrencies));

        $defaultLocale = $this->updateEnvChoice(
            'APP_LOCALE',
            'Please select <bg=black;fg=white;options=bold;>Default Application Locale (APP_LOCALE):</>',
            $allowedLocales
        );

        $defaultCurrency = $this->updateEnvChoice(
            'APP_CURRENCY',
            'Please select <bg=black;fg=white;options=bold;>Default Application Currency (APP_CURRENCY):</>',
            $allowedCurrencies
        );

        return [
            'default_locale'     => $defaultLocale,
            'allowed_locales'    => array_keys($allowedLocales),
            'default_currency'   => $defaultCurrency,
            'allowed_currencies' => array_keys($allowedCurrencies),
        ];
    }

    /**
     * Add the database credentials to the .env file.
     */
    protected function askForDatabaseDetails()
    {
        $databaseDetails = [
            'DB_CONNECTION' => select(
                'Please select the <bg=black;fg=white;options=bold;>database connection</>',
                ['mysql', 'pgsql', 'sqlsrv']
            ),

            'DB_HOST' => text(
                label: 'Please enter the <bg=black;fg=white;options=bold;>database host</>',
                default: env('DB_HOST', '127.0.0.1'),
                required: true
            ),

            'DB_PORT' => text(
                label: 'Please enter the <bg=black;fg=white;options=bold;>database port</>',
                default: env('DB_PORT', '3306'),
                required: true
            ),

            'DB_DATABASE' => text(
                label: 'Please enter the <bg=black;fg=white;options=bold;>database name</>',
                default: env('DB_DATABASE', ''),
                required: true
            ),

            'DB_PREFIX' => text(
                label: 'Please enter the <bg=black;fg=white;options=bold;>database prefix</>',
                default: env('DB_PREFIX', ''),
                hint: 'or press enter to continue'
            ),

            'DB_USERNAME' => text(
                label: 'Please enter your <bg=black;fg=white;options=bold;>database username</>',
                default: env('DB_USERNAME', ''),
                required: true
            ),

            'DB_PASSWORD' => password(
                label: 'Please enter your <bg=black;fg=white;options=bold;>database password</>',
                required: false
            ),
        ];

        if (
            ! $databaseDetails['DB_DATABASE']
            || ! $databaseDetails['DB_USERNAME']
            || ! $databaseDetails['DB_PASSWORD']
        ) {
            return $this->error('Please enter the database credentials.');
        }

        foreach ($databaseDetails as $key => $value) {
            if ($value) {
                $this->envUpdate($key, $value);
            }
        }
    }

    /**
     * Create a agent credentials.
     *
     * @return mixed
     */
    protected function createAgentCredentials()
    {
        $agentName = text(
            label: 'Enter super admin\'s <bg=black;fg=white;options=bold;>full name:</>',
            default: 'John Doe',
            required: true
        );

        $agentEmail = text(
            label: 'Enter super admin\'s <bg=black;fg=white;options=bold;>email address:</>',
            default: 'admin@example.com',
            validate: fn (string $value) => match (true) {
                ! filter_var($value, FILTER_VALIDATE_EMAIL) => 'The email address you entered is not valid please try again.',
                default                                     => null
            }
        );

        $agentPassword = text(
            label: 'Enter super admin\'s <bg=black;fg=white;options=bold;>password:</>',
            default: 'admin123',
            required: true
        );

        $password = password_hash($agentPassword, PASSWORD_BCRYPT, ['cost' => 10]);

        try {
            $fullName = explode(" ", $agentName);

            DB::table('super_admins')->updateOrInsert(
                ['id' => 1],
                [
                    'first_name' => $fullName[0] ?? 'John',
                    'last_name'  => $fullName[1] ?? 'Doe',
                    'email'      => $agentEmail,
                    'password'   => $password,
                    'role_id'    => 1,
                    'status'     => 1,
                ]
            );

            $filePath = storage_path('installed');

            File::put($filePath, 'Bagisto is successfully installed');

            $this->info('-----------------------------');
            $this->info('Congratulations!');
            $this->info('The installation has been finished and you can now use Bagisto Saas.');
            $this->info('Go to '.env('APP_URL').'/super/login'.' and authenticate with:');
            $this->info('Email: '.$agentEmail);
            $this->info('Password: '.$agentPassword);
            $this->info('Cheers!');

            Event::dispatch('bagisto.installed');
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Method for asking the details of .env files
     */
    protected function updateEnvVariable(string $key, string $question, string $defaultValue): void
    {
        $input = text(
            label: $question,
            default: $defaultValue,
            required: true
        );

        $this->envUpdate($key, $input ?: $defaultValue);
    }

    /**
     * Method for asking choice based on the list of options.
     *
     * @return string
     */
    protected function updateEnvChoice(string $key, string $question, array $choices)
    {
        $choice = select(
            label: $question,
            options: $choices,
            default: env($key)
        );

        $this->envUpdate($key, $choice);

        return $choice;
    }

    /**
     * Function for getting allowed choices based on the list of options.
     */
    protected function allowedChoice(string $question, array $choices, array $defaultSelected, int $defaultScroll = 5)
    {
        $selectedValues = multiselect(
            label: $question,
            options: array_values($choices),
            default: $defaultSelected,
            scroll: $defaultScroll,
        );

        $selectedChoices = [];

        foreach ($selectedValues as $selectedValue) {
            foreach ($choices as $key => $value) {
                if ($selectedValue === $value) {
                    $selectedChoices[$key] = $value;
                    break;
                }
            }
        }

        return $selectedChoices;
    }

    /**
     * Update the .env values.
     */
    protected function envUpdate(string $key, string $value): void
    {
        $data = file_get_contents(base_path('.env'));

        // Check if $value contains spaces, and if so, add double quotes
        if (preg_match('/\s/', $value)) {
            $value = '"'.$value.'"';
        }

        $data = preg_replace("/$key=(.*)/", "$key=$value", $data);

        file_put_contents(base_path('.env'), $data);
    }

    /**
     * Check key in `.env` file because it will help to find values at runtime.
     */
    protected static function getEnvAtRuntime(string $key): string|bool
    {
        if ($data = file(base_path('.env'))) {
            foreach ($data as $line) {
                $line = preg_replace('/\s+/', '', $line);

                $rowValues = explode('=', $line);

                if (strlen($line) !== 0) {
                    if (strpos($key, $rowValues[0]) !== false) {
                        return $rowValues[1];
                    }
                }
            }
        }

        return false;
    }
}