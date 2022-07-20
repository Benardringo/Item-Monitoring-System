<main id="main" class="main">


<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
    <div class="row">
      <div class="text-left" data-bs-toggle="modal" data-bs-target="#largeModal">
         <button type="button" class="btn btn-info col-sm-3">Add new item</button>
      </div> 
     
           <h5 class="card-title"></h5>
           @if(session()->has('massage'))
           <div class="alert alert-info alert-dismissible fade show" role="alert">
               {{session()->get('massage')}}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @foreach($item as $items)
            <div class="col-xxl-2 col-md-3" data-bs-toggle="modal" data-bs-target="#{{$items->name}}">
              <div class="card info-card sales-card ">
                  <div class="card-body ">
                     <h5 class="card-title">{{$items->name}}</h5>
                        <div  style=" width:50px; height:100px;"  class="d-flex align-items-center justify-content-center">
                           <img src="itemimage/{{$items->photo}}" class="d-block w-100" alt="...">
                         </div> 
                     <h5> {{$items->price}}</h5>
                  </div> 
              </div> 
            </div>
            @endforeach
         </div>
      </div>
    
    <!-- End Left side columns -->
  
       <!-- Large Modal -->
       <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add new item</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <!-- Horizontal Form -->
         <form action="{{url('add_item')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputText" name="name">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-3">
                <select id="inputState" class="form-select" name="category">
                    <option selected>Choose...</option>
                    <option value="drink">Drink</option>
                    <option value="ice cream">ice cream</option>
                 </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Discripsion</label>
              <div class="col-sm-8">
                    <textarea class="form-control" name="discripsion"style="height: 100px"></textarea>
                  </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
              <div class="col-sm-9">
                    <input class="form-control" type="file" id="formFile" name="photo">
                  </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Selling Price</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="inputText" name="price">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Buying Price</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="inputText" name="">
              </div>
            </div>
            <div class="modal-footer">
            
              <button type="submit" class="btn btn-primary col-sm-2">Add</button>
            </div>
                   
            
          </form><!-- End Horizontal Form -->
                    </div>
                   
                  </div>
                </div>
              </div><!-- End Large Modal-->

    
</div>
</section>

</main><!-- End #main -->
