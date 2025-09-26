@extends('admin.layout')
@section('title', 'Dashboard')
@section('conteudo')
    <main class="container mt-4">
        <section class="info row">
            <div class="col-12 col-md-4 mb-4">
                <div class="bg-gradient-green card text-white shadow-lg">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0">Faturamento</p>
                            <h3 class="mb-0">R$ 123,00</h3>
                        </div>
                        <i class="bi bi-currency-dollar" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="bg-gradient-blue card text-white shadow-lg">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0">Usuários</p>
                            <h3 class="mb-0">{{ $users }}</h3>
                        </div>
                        <i class="bi bi-people-fill" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="bg-gradient-orange card text-white shadow-lg">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0">Pedidos este mês</p>
                            <h3 class="mb-0">0</h3>
                        </div>
                        <i class="bi bi-cart-fill" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-12 col-lg-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center">Aquisição de usuários</h5>
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center">Produtos</h5>
                        <canvas id="myChart2" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('graficos')
    <script>
        /* Gráfico 01 */
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [{{ $userAno }}],
                datasets: [{
                    label: [{{!! $userLabel !!}}],
                    data: [{{ $userTotal }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: { // Correção para Chart.js v3+
                        beginAtZero: true
                    }
                }
            }
        });

        /* Gráfico 02 */
        var ctx2 = document.getElementById('myChart2'); // Use uma variável diferente (ctx2)
        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Facebook', 'Google', 'Instagram'],
                datasets: [{
                    label: 'Visitas',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 159, 64)'
                    ]
                }]
            }
        });
    </script>
@endpush
