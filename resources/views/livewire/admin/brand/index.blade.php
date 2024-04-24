<div>
    <div>

        @include('livewire.admin.brand.model-form')

        <style>select {
            --selectHoverCol:{{ $appSetting->color ?? ' ' }};
            --selectedCol:{{ $appSetting->color ?? ' ' }};
            width: 100%;
            font-size: 1em;
            padding: 0.3em;

          }

          select:focus {
            border-radius: 0px;
            border-color: rgb(7, 7, 7);
            background: #fff;
            outline: none;
          }

          .select-wrap {
            position: relative;
          }

          .select-wrap:focus-within select {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10;
          }

          option:hover {
            background-color: var(--selectHoverCol);
            color: #fff;
          }

          option:checked {
            box-shadow: 0 0 1em 100px var(--selectedCol) inset;
          }
          </style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Brands List
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                                class="btn btn-sm float-end"
                                style="background-color: {{ $appSetting->color ?? ' ' }};">Add Brands</a>
                        </h4>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                @if ($brand->category)
                                                    {{ $brand->category->name }}
                                                @else
                                                    No Category
                                                @endif
                                            </td>
                                            <td>{{ $brand->slug }}</td>
                                            <td>{{ $brand->status == '1' ? 'hidden' : 'visible' }}</td>
                                            <td>
                                                <a href="#" wire:click="editBrand({{ $brand->id }})"
                                                    data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="" wire:click="deleteBrand({{ $brand->id }})"
                                                    data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5">No Brands Found</td>
                                        </tr>
                                    @endforelse


                                </tbody>

                            </table>

                            <div>
                                {{ $brands->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#addBrandModel').model('hide');
                $('#updateBrandModal').model('hide');
            });



            setSelectHover();

            function setSelectHover(selector = "select") {
                let selects = document.querySelectorAll(selector);
                selects.forEach((select) => {
                    let selectWrap = select.parentNode.closest(".select-wrap");
                    // wrap select element if not previously wrapped
                    if (!selectWrap) {
                        selectWrap = document.createElement("div");
                        selectWrap.classList.add("select-wrap");
                        select.parentNode.insertBefore(selectWrap, select);
                        selectWrap.appendChild(select);
                    }
                    // set expanded height according to options
                    let size = select.querySelectorAll("option").length;

                    // adjust height on resize
                    const getSelectHeight = () => {
                        selectWrap.style.height = "auto";
                        let selectHeight = select.getBoundingClientRect();
                        selectWrap.style.height = selectHeight.height + "px";
                    };
                    getSelectHeight(select);
                    window.addEventListener("resize", (e) => {
                        getSelectHeight(select);
                    });

                    /**
                     * focus and click events will coincide
                     * adding a delay via setTimeout() enables the handling of
                     * clicks events after the select is focused
                     */
                    let hasFocus = false;
                    select.addEventListener("focus", (e) => {
                        select.setAttribute("size", size);
                        setTimeout(() => {
                            hasFocus = true;
                        }, 150);
                    });

                    // close select if already expanded via focus event
                    select.addEventListener("click", (e) => {
                        if (hasFocus) {
                            select.blur();
                            hasFocus = false;
                        }
                    });

                    // close select if selection was set via keyboard controls
                    select.addEventListener("keydown", (e) => {
                        if (e.key === "Enter") {
                            select.removeAttribute("size");
                            select.blur();
                        }
                    });

                    // collapse select
                    select.addEventListener("blur", (e) => {
                        select.removeAttribute("size");
                        hasFocus = false;
                    });
                });
            }
        </script>
    @endpush


</div>
