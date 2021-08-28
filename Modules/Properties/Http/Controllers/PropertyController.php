<?php

namespace Modules\Properties\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Repositories\AddressRepository;
use Modules\Customer\Repositories\CustomerRepository;
use Modules\Properties\Http\Requests\PropertyRequest;
use Modules\Properties\Models\PropertyTypes;
use Modules\Properties\Repositories\PropertyRepository;

class PropertyController extends Controller
{
    private PropertyRepository $propertyRepository;
    private CustomerRepository $customerRepository;
    private AddressRepository $addressRepository;
    private ImageService $imageService;

    final public function __construct(
        CustomerRepository $customerRepository,
        PropertyRepository $propertyRepository,
        AddressRepository $addressRepository,
        ImageService $imageService
    )
    {
        $this->propertyRepository = $propertyRepository;
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
        $this->imageService = $imageService;
    }

    final public function index(): Renderable
    {
        $properties = $this->propertyRepository->all();

        return view('properties::index')->with([
            'properties' => $properties
        ]);
    }

    final public function create(): Renderable
    {
        $propertyTypes = PropertyTypes::toArray();
        $customers = $this->customerRepository->pluck('name', 'id');


        return view('properties::create')->with([
            'propertyTypes' => $propertyTypes,
            'customers' => $customers
        ]);
    }

    final public function store(PropertyRequest $request): RedirectResponse
    {
        $address = $this->addressRepository->create($request->address);
        $this->imageService->saveImage($request, 'image');

        $request['address_id'] = $address->id;
        unset($request['address']);

        $this->propertyRepository->create($request->input());

        return redirect()->route('properties.index');
    }

    final public function show(int $id): Renderable
    {
        $property = $this->propertyRepository->find($id);

        return view('properties::show')->with(['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    final public function edit($id)
    {
        return view('properties::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    final public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    final public function destroy($id)
    {
        //
    }
}
