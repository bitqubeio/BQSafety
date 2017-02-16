@extends('layouts.main')

@section('content')
    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Reportes</h4>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Hoy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Semana</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Mes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Año</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <canvas height="150" id="pieChartTest"></canvas>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <canvas id="nowChartjs"></canvas>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    3
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    4
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Últimos reportes</h4>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Enviado por</th>
                                    <th>Estado</th>
                                    <th class=" text-center">Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"><a href="#">1</a></th>
                                    <td>Mark</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">2</a></th>
                                    <td>Jacob</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">3</a></th>
                                    <td>Juan</td>
                                    <td><span class="text-danger">No revisado</span></td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">4</a></th>
                                    <td>Mark</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">5</a></th>
                                    <td>Jacob</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">6</a></th>
                                    <td>Juan</td>
                                    <td><span class="text-danger">No revisado</span></td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">7</a></th>
                                    <td>Mark</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">8</a></th>
                                    <td>Jacob</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">9</a></th>
                                    <td>Juan</td>
                                    <td><span class="text-danger">No revisado</span></td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">10</a></th>
                                    <td>Mark</td>
                                    <td>Revisado</td>
                                    <td class="actions text-center"><a href="#"><i class="fa fa-eye"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button class="btn btn-sm btn-create">Ver todo</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 my-4">
                    <div class="card">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-lg-6 flex-middle">
                                    <h4>Top 3</h4>
                                    <p>Más activos durante el mes</p>
                                    <table class="table table-ranking-left">
                                        <tbody>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div class="large">132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div class="large">132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #eceeef;">
                                            <td scope="row">3</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div class="large">132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Tabla right -->
                                <div class="col-lg-6">
                                    <table class="table table-ranking-right table-striped table-sm">
                                        <tbody>
                                        <tr>
                                            <td scope="row">4</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">5</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">6</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">7</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">8</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">9</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">10</td>
                                            <td>
                                                <div class="divimg">
                                                    <img src="bqsafety/img/user.png" alt="Avatar">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 username">
                                                        <a href="#">Username</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 text-center">
                                                                <div class="text-muted small">POINTS</div>
                                                                <div>132</div>
                                                            </div>
                                                            <div class="col-lg-10 flex-bottom">
                                                                <div class="text-muted small"><b>9</b> REVIEWS MADE</div>
                                                                <div class="text-muted small"><b>1</b> REVIEWS RECEIVED</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 text-center my-3">
                                    <button class="btn btn-create">Ver todo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    {!! $nowChartjs->render() !!}
    {!! $chartjs->render() !!}
@endsection
