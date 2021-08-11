<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Address\Repositories\AddressRepository;
use Modules\Customer\Config\CustomerModule;
use Modules\Customer\Http\Requests\CustomerRequest;
use Modules\Customer\Http\Requests\CustomerUpdateRequest;
use Modules\Customer\Repositories\CustomerRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Storage;

class CustomerController extends Controller
{
    private CustomerRepository $customerRepository;
    private AddressRepository $addressRepository;

    public function __construct(CustomerRepository $customerRepository, AddressRepository $addressRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    final public function index(): Renderable
    {
        $customers = $this->customerRepository->all();

        return view('users.index')->with([
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    final public function create(): Renderable
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CustomerRequest  $request
     * @return RedirectResponse
     * @throws ValidatorException
     */
    final public function store(CustomerRequest $request): RedirectResponse
    {
        $address = $this->addressRepository->create($request->address);

        $request['address_id'] = $address->id;

        if ($request->file('cover')) {
            $request['cover'] = $request->file('cover')->store(CustomerModule::MODULE_SLUG);
        }

        $this->customerRepository->create($request->input());

        return redirect()->route('customer.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    final public function show(int $id): Renderable
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    final public function edit(int $id): Renderable
    {
        $customer = $this->customerRepository->with('address')->find($id);

        return view('users.create')->with([
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  CustomerUpdateRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     * @throws ValidatorException
     */
    final public function update(CustomerUpdateRequest $request, int $id): RedirectResponse
    {
        $user = $this->customerRepository->find($id);
        $this->addressRepository->update($request->address, $user->address->id);

        if ($request->file('cover')) {
            Storage::delete( $user->cover );
            $request['cover'] = $request->file('cover')->store(CustomerModule::MODULE_SLUG);
        }

        $this->customerRepository->update($request->input(), $id);

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    final public function destroy(int $id): RedirectResponse
    {
        $this->customerRepository->delete($id);

        return redirect()->route('customer.index');
    }
}
