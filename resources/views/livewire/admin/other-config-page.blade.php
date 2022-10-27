<div>
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-danger">  <i class="fas fa-users-cog"></i> ADMINISTRATION</h1>
            </div>
        </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#abonnements" data-toggle="tab">
                            <i class="fas fa-users"></i> Abonnements
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#services" data-toggle="tab">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#types" data-toggle="tab">
                           Type patient
                        </a>
                    </li>
                </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="abonnements">
                        @livewire('admin.abonnement-page')
                    </div>
                    <div class=" tab-pane" id="services">
                        <div>
                            Service
                        </div>
                    </div>
                    <div class=" tab-pane" id="types">
                        <div>
                            Type
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
