<x-layout>
    <section class="px-2 py-4">
        <main class="max-w-8xl mx-auto mt-10 lg:mt-20 space-y-6 bg-gray-200">
            <article class="max-w-8xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $product->created_at->diffForHumans() }}</time>
                    </p>
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://i.pravatar.cc/60?u={{ $product->category_id }}" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $product->author->name }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="http://localhost/Courses/public/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                          العودة الى الصفحة الرئيسية
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$product->category" />
                        </div>
                    </div>


                    <div>

                        <div class="row">

                        <main class="col-lg-6">
                          {{-- <article class="ps-lg-3">
                            <h4 class="title text-dark">{{$product->title}}</h4>
                            <div class="rating-wrap my-3">
                              <ul class="rating-stars">
                                <li style="width:80%" class="stars-active"> <img src="images/misc/stars-active.svg" alt=""> </li>
                                <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
                              </ul>
                              <b class="label-rating text-warning"> 4.5</b>
                              <i class="dot"></i>
                              <span class="label-rating text-muted"> <i class="fa fa-shopping-basket"></i> 154 orders </span>
                              <i class="dot"></i>
                              <span class="label-rating text-success">In stock</span>
                            </div> <!-- rating-wrap.// -->

                            <div class="mb-3">
                              <var class="price h5">$ {{$product->price}}</var>
                              <span class="text-muted">/per box</span>
                            </div>

                            <p>{!!$product->excerpt!!}</p>

                            <dl class="row">
                              <dt class="col-6">Type:</dt>
                              <dd class="col-6">Regular</dd>

                              <dt class="col-6">Color</dt>
                              <dd class="col-6">Brown</dd>

                              <dt class="col-6">Material</dt>
                              <dd class="col-6">Cotton, Jeans </dd>

                              <dt class="col-6">Brand</dt>
                              <dd class="col-6">Reebook </dd>
                            </dl>

                            <hr>

                            <div class="row mb-4">
                              <div class="col-md-4 col-6 mb-2">
                                <label class="form-label">Size</label>
                                <select class="form-select">
                                  <option>Small</option>
                                  <option>Medium</option>
                                  <option>Large</option>
                                </select>
                              </div> <!-- col.// -->
                              <div class="col-md-4 col-6 mb-3">
                                <label class="form-label d-block">Quantity</label>
                                <div class="input-group input-spinner row" style="width: 120%">
                                  <button  class="btn btn-icon btn-light col-md-4" type="button">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999" viewBox="0 0 24 24">
                                        <path d="M19 13H5v-2h14v2z"></path>
                                      </svg>
                                  </button>
                                  <input class="form-control text-center col-md-4" placeholder="" value="1" style="width: 25%">
                                  <button class="btn btn-icon btn-light col-md-4" type="button">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999" viewBox="0 0 24 24">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                      </svg>
                                  </button>

                                </div> <!-- input-group.// -->
                              </div> <!-- col.// -->
                            </div> <!-- row.// -->
{{--  --}}
                            {{-- <div class="btn  btn-primary my-2">
                              <form action="cart" method="post">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{$product->id}}">
                                  <input type="hidden" name="title" value="{{$product->title}}">
                                  <input type="hidden" name="price" value="{{$product->price}}">
                                  <button type="submit" class="transition-colors duration-300 text-md font-semibold hover:bg-green-400  "
                                  >
                                  <i class="me-1 fa fa-shopping-basket"></i>Add to cart</button>
                                </form>
                              </div>  --}}

                            <a href="#" class="btn  btn-warning mx-2"> اشترك بلكورس </a>
                            {{-- <a href="#" class="btn  btn-primary mx-2"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a> --}}
                            <a href="#" class="btn  btn-light mx-2"> <i class="me-1 fa fa-heart"></i> اعجبني </a>

                          </article> <!-- product-info-aside .// -->
                        </main> <!-- col.// -->
                        </div> <!-- row.// -->

                        </div> <!-- container .//  -->
                        </section>


                </div>
                <div class="col-span-4 col-start-5 mt-10 space-y-6">
                    @include('products._add-comment-form')

                    @foreach($product->comments as $comment)
                        <x-product-comment :comment="$comment" />
                    @endforeach

                </div>
            </article>
        </main>

    </section>

</x-layout>

