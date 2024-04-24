
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" wire:click="closeModel" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand">

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select class="selectHovercolor"  wire:model.defer="category_id" required >
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $cateItem)
                                <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="MB-3">
                        <Label>Brands Name</Label>
                        <input type="text" wire:model.defer="name" class="form-control">

                    </div>
                    <div class="MB-3">
                        <Label>Brands Slug</Label>
                        <input type="text" wire:model.defer="slug" class="form-control">


                    </div>
                    <div class="MB-3">
                        <Label>Status</Label> <br />
                        <input type="checkbox" wire:model.defer="status" /> checkbox=Hidden, Un-Checked= Visible



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModel" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" data-bs-dismiss="modal" class="btn" style="background-color: {{ $appSetting->color ?? ' ' }};">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>





<!-- Brand Update Model -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModel" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div><span class="p-1">Loading...</span>
            </div>


            <div wire:loading.remove>

                <form wire:submit.prevent="updateBrand">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Select Category</label>
                            <select class="selectHovercolor" wire:model.defer="category_id" >
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $cateItem)
                                    <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="MB-3">
                            <Label>Brands Name</Label>
                            <input type="text" wire:model.defer="name" class="form-control">
                        </div>
                        <div class="MB-3">
                            <Label>Brands Slug</Label>
                            <input type="text" wire:model.defer="slug" class="form-control">


                        </div>
                        <div class="MB-3">
                            <Label>Status</Label> <br />
                            <input type="checkbox" wire:model.defer="status" /> checkbox=Hidden, Un-Checked= Visible



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModel" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn" style="background-color: {{ $appSetting->color ?? ' ' }};">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>




<!-- Brand Update Model -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModel" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div><span class="p-1">Loading...</span>
            </div>


            <div wire:loading.remove>

                <form wire:submit.prevent="destroyBrand">

                    <div class="modal-body">
                        <div class="MB-3">
                            <h4>Are You Sure You Want To Delete This Data?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModel" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn" style="background-color: {{ $appSetting->color ?? ' ' }};">Yes. Delete</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



