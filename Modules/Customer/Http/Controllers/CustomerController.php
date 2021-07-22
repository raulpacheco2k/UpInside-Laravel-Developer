<?php

namespace Modules\Customer\Http\Controllers;

use Modules\Customer\Http\Requests\CustomerStoreRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customer\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    private CustomerRepository $customerRepository;

    /**
     * CustomerController constructor.
     *
     * @param  CustomerRepository  $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = $this->customerRepository->all();

        return view('users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CustomerStoreRequest  $request
     * @return RedirectResponse
     */
    final public function store(CustomerStoreRequest $request): RedirectResponse
    {
        $this->customerRepository->create($request->input());

        return redirect()->route('admin.users.create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    final public function edit(int $id)
    {
        $user = $this->customerRepository->find($id);

        return view('customer::edit')->with([
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
