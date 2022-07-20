 <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          <div class="card ">
            <div class="card-body">
                <h5 class="card-title"></h5>
                @if(session()->has('massage'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                 {{session()->get('massage')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                @endif
              <!-- Horizontal Form -->
              <form action="{{url('add_store')}}" method="POST" enctype="multpart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Store Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="location">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary col-sm-2">Create</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->
