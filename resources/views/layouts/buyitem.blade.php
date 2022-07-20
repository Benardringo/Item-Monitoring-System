
<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body>
@include('layouts.topbar')
@include('layouts.sidebar')
<main id="main" class="main">

<section class="section dashboard">
  <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
          <div class="row">
          @if(session()->has('massage'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
               {{session()->get('massage')}}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
                
         @endif

            <!-- Sales Card -->
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
             <!-- Small Modal -->
   <div class="modal fade" id="{{$items->name}}" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title"><b>{{$items->name}}</b></h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         <form action="{{url('buy_item')}}" method="POST">
             @csrf
            <div class="modal-body">
               <div class="row mb-3">
                   <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-3">
                     <select id="inputState" class="form-select" name="type">
                       <option value="Carton" selected>Carton</option>
                       <option value="Cret">Cret</option>
                     </select>
                  </div>
               </div>
               <div class="row mb-3">
                 <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" id="inputText" name="quantity">
                  </div>
               </div>
            </div>
             <input type="hidden" value="{{$items->name}}" name="name">
             <input type="hidden" value="{{$items->id}}" name="id">
             
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary col-sm-3">Buy</button>
            </div>
        </form>
    </div>
   </div>
</div><!-- End Small Modal-->
            @endforeach

           </div>
     </div><!-- End Sales Card -->
   </div>
</section>

 

              
</div>
</main><!-- End #main -->

@include('layouts.script')
</body>
</html>

