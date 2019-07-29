
    <div class="container">
        <div class="row">
            <div class="col-md-2 border-thing text-left">
                <h2 class="text-white">Categories</h2>
                <button class="btn btn-secondary" data-toggle="collapse" type="button" data-target="#categoriesToggler" aria-expanded="false" id="catCollapse">Show Categories </button>
                <ul class="collapse float-left list-group" id="categoriesToggler">
                    @foreach ($categories as $category)
                        @if($category->mangas->count() > 0)
                            <a href=" {{route('mangashop.category', $category->id)}} " class="reset-text text-white">
                                <li class="categories-btn w-100 list-group-item ">
                                    <div class="mt-1">{{$category->name}}</div>
                                </li>
                            </a>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-10 text-center text-white">
            @php ($counter = 0)
            @foreach($mangas as $manga)
                @if($manga->volumes->count() > 0)
                    @if($counter == 0)
                    <div class="row p-3">
                    @endif
                        @foreach($manga->volumes as $volume)
                                <div class="inner-wrap-shop my-2 mr-2">
                                    <a href=" {{route('mangashop.show', $volume->id)}} " class="text-reset"><img src="
                                    {{isset($volume->image) ? 
                                    asset("storage/$volume->image") : 
                                    asset("storage/$volume->manga()->image")}}" 
                                    class="carousel-cell-image"> </a>  
                                    <div class="text-center">    
                                        <h5 class=" pt-2"> Manga </h5>
                                        <div class="tx-div"></div>
                                        <a href=" {{route('mangashop.show', $volume->id)}} " class="text-reset"> <p> {{$volume->manga->title}} {{$volume->volume}} </p>  </a>
                                        <span class="price"> 
                                            @if(isset($volume->discount))
                                                <del> <span>${{$volume->price}}</span> </del><br>
                                                <ins> <span>${{round((1 - $volume->discount/100) * $volume->price, 2)}}</span> </ins>
                                            @else
                                                ${{$volume->price}} 
                                            @endif
                                        </span>
                                    </div>
                                </div>
                        @endforeach
                    @if($counter == $mangas->count())
                    </div>
                    @endif
                @else 
                    <h1 class="text-white">No Manga Yet</h1>
                @endif
                @php ($counter++)
            @endforeach
                <div class="d-flex justify-content-center">
                        
                    </div>
            </div>
        </div>
    </div>