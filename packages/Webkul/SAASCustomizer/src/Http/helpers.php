<?php
    use Webkul\SAASCustomizer\Company;
    use Webkul\SAASCustomizer\SuperSystemConfig;
    use Webkul\SAASCustomizer\SuperAcl;

    if (! function_exists('company')) {
        function company()
        {
            return app()->make(Company::class);
        }
    }

    if (! function_exists('companyBouncer')) {
        function companyBouncer()
        {
            return app()->make(\Webkul\SAASCustomizer\Bouncer::class);
        }
    }

    if (! function_exists('super_system_config')) {
        /**
         * Super System Config helper.
         */
        function super_system_config(): SuperSystemConfig
        {
            return app('super_system_config');
        }
    }

    if (! function_exists('super_acl')) {
        /**
         * Super ACL Config helper.
         */
        function super_acl(): SuperAcl
        {
            return app('super_acl');
        }
    }