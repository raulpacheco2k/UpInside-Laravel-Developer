<?php

namespace Modules\Companies\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Repositories\AddressRepository;
use Modules\Companies\Http\Requests\CompanyRequest;
use Modules\Companies\Http\Requests\CompanyUpdateRequest;
use Modules\Companies\Repositories\CompanyRepository;
use Modules\Customer\Repositories\CustomerRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class CompanyController extends Controller
{

    private CompanyRepository $companiesRepository;
    private CustomerRepository $customerRepository;
    private AddressRepository $addressRepository;

    /**
     * @param  CompanyRepository  $companiesRepository
     * @param  CustomerRepository  $customerRepository
     * @param  AddressRepository  $addressRepository
     */
    public function __construct(CompanyRepository $companiesRepository, CustomerRepository $customerRepository, AddressRepository $addressRepository)
    {
        $this->companiesRepository = $companiesRepository;
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    final public function index(): Renderable
    {
        $companies = $this->companiesRepository->all();

        return view('companies::index')->with([
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    final public function create(): Renderable
    {
        $customers = $this->customerRepository->pluck('name', 'id');

        return view('companies::create')->with([
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  CompanyRequest  $request
     * @return RedirectResponse
     * @throws ValidatorException
     */
    final public function store(CompanyRequest $request): RedirectResponse
    {
        $address = $this->addressRepository->create($request->address);

        $request['address_id'] = $address->id;

        $this->companiesRepository->create($request->input());

        return redirect()->route('company.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    final public function show(int $id): Renderable
    {
        $company = $this->companiesRepository->find($id);

        return view('companies::show')->with([
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    final public function edit(int $id): Renderable
    {
        $company = $this->companiesRepository->find($id);
        $customers = $this->customerRepository->pluck('name', 'id');

        return view('companies::create')->with([
            'company' => $company,
            'customers' => $customers
        ]);

    }

    /**
     * Update the specified resource in storage.
     * @param  CompanyUpdateRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     * @throws ValidatorException
     */
    final public function update(CompanyUpdateRequest $request, int $id): RedirectResponse
    {
        $company = $this->companiesRepository->find($id);

        $this->addressRepository->update($request->address, $company->address->id);
        $this->companiesRepository->update($request->input(), $id);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return RedirectResponse
     */
    final public function destroy(int $id): RedirectResponse
    {
        $this->companiesRepository->delete($id);

        return redirect()->route('customer.index');
    }
}
