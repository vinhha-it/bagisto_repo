<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\User\Repositories\AdminRepository;
use Webkul\User\Repositories\RoleRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Http\Requests\CompanyRegistrationForm;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;
use Webkul\SAASCustomizer\Repositories\Super\CompanyDetailsRepository;
use Webkul\SAASCustomizer\Facades\Company;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\User\Repositories\AdminRepository  $adminRepository
     * @param  \Webkul\User\Repositories\RoleRepository  $roleRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CompanyRepository  $companyRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CompanyDetailsRepository  $companyDetailsRepository
     * @return void
     */
    public function __construct(
        protected AdminRepository $adminRepository,
        protected RoleRepository $roleRepository,
        protected ProductRepository $productRepository,
        protected CompanyRepository $companyRepository,
        protected CompanyDetailsRepository $companyDetailsRepository,
    ) {
        $this->middleware('auth:super-admin', ['only' => ['edit', 'update']]);

        if (! Company::isAllowed()) {

            throw new \Exception('not-allowed-to-visit-this-section', 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saas::companies.auth.register');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\SAASCustomizer\Http\Requests\CompanyRegistrationForm  $request
     */
    public function store(CompanyRegistrationForm $request): JsonResponse
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'username'  => 'not_in:'.implode(',', config('excluded-sites')),
        ]);

        if ($validator->fails()) {

            return new JsonResponse([
                'success'   => false,
                'errors'    => $validator->errors(),
            ], 403);
        }

        $primaryServerNameWithoutProtocol = company()->getPrimaryUrl();

        $currentURL = $_SERVER['HTTP_HOST'];

        // check if tenant domain
        if (substr_count($currentURL, '.') > 1) {
            $primaryServerNameWithoutProtocol = explode('.', $primaryServerNameWithoutProtocol);

            if ($data['username'] == $primaryServerNameWithoutProtocol[0]) {

                return new JsonResponse([
                    'success' => false,
                    'errors'  => [trans('saas::app.tenant.custom-errors.same-domain')],
                ], 403);
            }

            array_unshift($primaryServerNameWithoutProtocol, $data['username']);

            $primaryServeNameWithoutProtocol = implode('.', $primaryServerNameWithoutProtocol);

            $temp = explode('/', $primaryServeNameWithoutProtocol);

            $data['domain'] = current($temp);

            $data['url'] = $primaryServeNameWithoutProtocol;
        } else {
            // check if super admin domain
            $data['domain'] = strtolower($data['username']). '.'.$primaryServerNameWithoutProtocol;
        }

        $validator = Validator::make($data, [
            'domain'    => 'required|unique:companies,domain',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->errors()
            ], 403);
        }

        $data['more_info'] = json_encode([
            'created'   => true,
            'seeded'    => false,
        ]);

        $company = $this->companyRepository->create($data);

        if (! $company) {
            return new JsonResponse([
                'success' => false,
            ], 403);
        }

        $data['password'] = bcrypt($data['password']);

        $data['name']     = $data['first_name'].' '.$data['last_name'];

        $data['status']   = 1;

        //creates a new full privilege role when new company is registered
        $role = $this->roleRepository->create([
            'name'            => 'Administrator',
            'description'     => 'Administrator role',
            'permission_type' => 'all',
            'permissions'     => null,
            'company_id'      => $company->id,
        ]);

        $data['role_id']    = $role->id;

        $data['company_id'] = $company->id;

        //creates a new full privilege admin with newly created role above
        $this->adminRepository->create($data);

        //creates the personal details record for the company
        $this->companyDetailsRepository->create($data);

        $companyDomain = isset($data['url']) ? $data['url'] : $data['domain'];

        $seedUrl = 'http://'.$companyDomain.'/company/seed-data';

        if (str_contains(config('app.url'), 'https://')) {
            $seedUrl = 'https://'.$companyDomain.'/company/seed-data';
        }

        return new JsonResponse([
            'success'      => true,
            'redirect_url' => $seedUrl,
        ], 200);
    }

    /**
     * To validate first step data.
     */
    public function validateStepOne(): JsonResponse
    {
        $niceNames = array(
            'email' => 'Email',
        );

        $validator = Validator::make(request()->all(), [
            'email' => 'required|email|unique:admins,email',
        ]);

        $validator->setAttributeNames($niceNames);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 403);
        } 

        return response()->json([
            'success' => true,
            'errors' => null
        ], 200);
    }

    /**
     * To validate second step data.
     */
    public function validateStepTwo(): JsonResponse
    {
        $niceNames = array(
            'phone' => 'Phone',
        );

        $validator = Validator::make(request()->all(), [
            'phone' => 'required|numeric|unique:company_personal_details,phone',
        ]);

        $validator->setAttributeNames($niceNames);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 403);
        } 

        return response()->json([
            'success' => true,
            'errors' => null
        ], 200);
    }

    /**
     * To validate third step data.
     */
    public function validateStepThree(): JsonResponse
    {
        $niceNames = array(
            'username' => 'Username',
            'name'     => 'Organization Name',
        );

        $validator = Validator::make(request()->all(), [
            'username' => ['required', 'unique:companies,username', new \Webkul\Core\Rules\Code()],
            'name'     => 'required|string|max:191|unique:companies,name',
        ]);

        $validator->setAttributeNames($niceNames);

        $tenantDomain = request('username').".".request()->server("HTTP_HOST");

        $channelRepository = app('\Webkul\Core\Repositories\ChannelRepository');
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 403);
        }
        
        if ($channelRepository->findWhere(['hostname' => $tenantDomain])->count() > 0) {
            return response()->json([
                'success' => false,
                'errors' => [
                    "username" => [trans("validation.unique", ["attribute" => "username"])],
                ]
            ], 403);
        }

        return response()->json([
            'success'  => true,
            'save_url' => route('company.create.store'),
            'errors'   => null,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $company = $this->companyRepository->findOrFail($id);

        try {
            Event::dispatch('saas.company.delete.before', $id);

            $this->productRepository->deleteWhere(['company_id' => $id]);

            $this->companyRepository->delete($id);

            Event::dispatch('saas.company.delete.after', $id);

            return new JsonResponse([
                'message' => trans('saas::app.super.tenants.delete-success')
            ]);
        } catch(\Exception $e) {}

        return new JsonResponse([
            'message' => trans('saas::app.super.tenants.delete-failed')
        ], 500);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');
        
        try {
            foreach ($indices as $index) {
                $this->productRepository->deleteWhere(['company_id' => $index]);

                $this->companyRepository->delete($index);
            }
            return new JsonResponse([
                'message' => trans('saas::app.super.tenants.index.datagrid.mass-delete-success'),
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}