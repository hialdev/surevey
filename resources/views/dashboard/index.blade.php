@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Total Respondents Card -->
        <div class="col-md-4">
            <div class="card border-0 bg-white rounded-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Respondents</h5>
                    <p class="card-text">{{ $totalRespondents }}</p>
                </div>
            </div>
        </div>
        <!-- Total Questions Card -->
        <div class="col-md-4">
            <div class="card border-0 bg-white rounded-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Questions</h5>
                    <p class="card-text">{{ $totalQuestions }}</p>
                </div>
            </div>
        </div>
        <!-- Total Respondent Users Card -->
        <div class="col-md-4">
            <div class="card border-0 bg-white rounded-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Respondent Users</h5>
                    <p class="card-text">{{ $totalRespondentUsers }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Bar Chart: Top 5 Answers -->
        <div class="col-md-6">
            <div class="card border-0 bg-white rounded-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Top 5 Answers</h5>
                    <canvas id="topResponsesChart"></canvas>
                </div>
            </div>
        </div>
        <!-- Hourly Survey Statistics -->
        <div class="col-md-6">
            <div class="card border-0 bg-white rounded-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Hourly Survey Statistics</h5>
                    <input type="date" id="surveyDate" class="form-control" value="{{ $date }}" />
                    <canvas id="hourlyStatsChart" class="mt-3"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar chart for top responses
        var ctx = document.getElementById('topResponsesChart').getContext('2d');
        var topResponsesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($topResponses->pluck('response')) !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! json_encode($topResponses->pluck('count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' votes';
                            }
                        }
                    }
                }
            }
        });

        // Line chart for hourly survey statistics
        var ctx = document.getElementById('hourlyStatsChart').getContext('2d');
        var hourlyStatsData = Object.values({!! json_encode($hourlyStats) !!});
        var hourlyStatsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({length: 24}, (v, k) => k + ':00'),
                datasets: [{
                    label: 'Surveys',
                    data: hourlyStatsData,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Date input change event
        document.getElementById('surveyDate').addEventListener('change', function () {
            window.location.href = "{{ route('dashboard') }}" + "?date=" + this.value;
        });
    });
</script>
@endsection
