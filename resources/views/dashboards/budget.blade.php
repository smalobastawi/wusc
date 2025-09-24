@extends('layouts.dashboard')

@section('title', 'Budget Information Dashboard')

@section('content')
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Budget Distribution Charts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <h3 class="text-base font-medium mb-1 text-center">Budget Allocation</h3>
                    <div class="chart-container" style="height: 220px">
                        <canvas id="budgetPieChart"></canvas>
                    </div>
                </div>
                <div>
                    <h3 class="text-base font-medium mb-1 text-center">Spent vs Allocated</h3>
                    <div class="chart-container" style="height: 220px">
                        <canvas id="budgetBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Budget Overview in figures</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">Total Budget</h3>
                    <p class="text-xl font-bold text-blue-600 dark:text-blue-400">$1,000,000</p>
                </div>
                <div class="bg-green-50 dark:bg-green-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Spent</h3>
                    <p class="text-xl font-bold text-green-600 dark:text-green-400">$750,000</p>
                </div>
                <div class="bg-yellow-50 dark:bg-yellow-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Remaining</h3>
                    <p class="text-xl font-bold text-yellow-600 dark:text-yellow-400">$250,000</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Budget Breakdown</h2>
            <div class="overflow-x-auto">
                <table class="table min-w-full table-auto text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th class="px-3 py-2 text-left">Category</th>
                            <th class="px-3 py-2 text-left">Allocated</th>
                            <th class="px-3 py-2 text-left">Spent</th>
                            <th class="px-3 py-2 text-left">Remaining</th>
                            <th class="px-3 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">Personnel</td>
                            <td class="px-3 py-2">$400,000</td>
                            <td class="px-3 py-2">$350,000</td>
                            <td class="px-3 py-2">$50,000</td>
                            <td class="px-3 py-2"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">On
                                    Track</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Equipment</td>
                            <td class="px-3 py-2">$300,000</td>
                            <td class="px-3 py-2">$280,000</td>
                            <td class="px-3 py-2">$20,000</td>
                            <td class="px-3 py-2"><span
                                    class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Caution</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Travel</td>
                            <td class="px-3 py-2">$150,000</td>
                            <td class="px-3 py-2">$100,000</td>
                            <td class="px-3 py-2">$50,000</td>
                            <td class="px-3 py-2"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">On
                                    Track</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Miscellaneous</td>
                            <td class="px-3 py-2">$150,000</td>
                            <td class="px-3 py-2">$20,000</td>
                            <td class="px-3 py-2">$130,000</td>
                            <td class="px-3 py-2"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">On
                                    Track</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold mb-3">Monthly Spending Trend</h2>
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-sm">
                        <span>January</span>
                        <div class="flex items-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mr-2">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 80%"></div>
                            </div>
                            <span class="text-xs">$80k / $100k</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span>February</span>
                        <div class="flex items-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mr-2">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 70%"></div>
                            </div>
                            <span class="text-xs">$70k / $100k</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span>March</span>
                        <div class="flex items-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mr-2">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 90%"></div>
                            </div>
                            <span class="text-xs">$90k / $100k</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span>April</span>
                        <div class="flex items-center">
                            <div class="w-24 bg-gray-200 rounded-full h-1.5 mr-2">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 60%"></div>
                            </div>
                            <span class="text-xs">$60k / $100k</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold mb-3">Budget Utilization</h2>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span>Personnel</span>
                            <span>87.5%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                            <div class="bg-green-600 h-1.5 rounded-full" style="width: 87.5%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span>Equipment</span>
                            <span>93.3%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                            <div class="bg-yellow-600 h-1.5 rounded-full" style="width: 93.3%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span>Travel</span>
                            <span>66.7%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                            <div class="bg-blue-600 h-1.5 rounded-full" style="width: 66.7%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span>Miscellaneous</span>
                            <span>13.3%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                            <div class="bg-red-600 h-1.5 rounded-full" style="width: 13.3%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Key Questions Answered</h2>
            <ul class="space-y-1 text-sm">
                <li class="flex items-center">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                    Am I on budget? <strong class="ml-1">Yes, 75% spent, 25% remaining</strong>
                </li>
                <li class="flex items-center">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                    What have I already committed/spent? <strong class="ml-1">$750,000 spent</strong>
                </li>
                <li class="flex items-center">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                    What is my remaining balance? <strong class="ml-1">$250,000 available</strong>
                </li>
            </ul>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            // Pie Chart for Budget Allocation
            const pieCtx = document.getElementById('budgetPieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Personnel', 'Equipment', 'Travel', 'Miscellaneous'],
                    datasets: [{
                        data: [400000, 300000, 150000, 150000],
                        backgroundColor: [
                            '#3B82F6',
                            '#10B981',
                            '#F59E0B',
                            '#8B5CF6'
                        ],
                        hoverBackgroundColor: [
                            '#2563EB',
                            '#059669',
                            '#D97706',
                            '#7C3AED'
                        ],
                        borderWidth: 1,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 10,
                                font: {
                                    size: 10
                                },
                                boxWidth: 12
                            }
                        },
                        tooltip: {
                            bodyFont: {
                                size: 10
                            },
                            titleFont: {
                                size: 10
                            },
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    label += '$' + value.toLocaleString() + ' (' + percentage + '%)';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Bar Chart for Spent vs Allocated
            const barCtx = document.getElementById('budgetBarChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['Personnel', 'Equipment', 'Travel', 'Miscellaneous'],
                    datasets: [{
                        label: 'Allocated',
                        data: [400000, 300000, 150000, 150000],
                        backgroundColor: '#3B82F6',
                        borderColor: '#3B82F6',
                        borderWidth: 1,
                        barPercentage: 0.6,
                        categoryPercentage: 0.8
                    }, {
                        label: 'Spent',
                        data: [350000, 280000, 100000, 20000],
                        backgroundColor: '#10B981',
                        borderColor: '#10B981',
                        borderWidth: 1,
                        barPercentage: 0.6,
                        categoryPercentage: 0.8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 9
                                },
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 9
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    size: 10
                                },
                                boxWidth: 12
                            }
                        },
                        tooltip: {
                            bodyFont: {
                                size: 10
                            },
                            titleFont: {
                                size: 10
                            },
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += '$' + context.parsed.y.toLocaleString();
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

    <style>
        .chart-container {
            position: relative;
            margin: auto;
        }

        /* Ensure all text is appropriately sized */
        .text-sm {
            font-size: 0.875rem;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .text-base {
            font-size: 1rem;
        }
    </style>
@endsection
