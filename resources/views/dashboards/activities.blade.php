@extends('layouts.dashboard')

@section('title', 'Project Activities Dashboard')

@section('content')
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Activity Visualizations</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <h3 class="text-base font-medium mb-1 text-center">Activity Status Distribution</h3>
                    <div class="chart-container" style="height: 220px">
                        <canvas id="activityStatusPieChart"></canvas>
                    </div>
                </div>
                <div>
                    <h3 class="text-base font-medium mb-1 text-center">Project Progress by Activity</h3>
                    <div class="chart-container" style="height: 220px">
                        <canvas id="activityProgressBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Activity Status Overview</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="bg-green-50 dark:bg-green-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Completed</h3>
                    <p class="text-xl font-bold text-green-600 dark:text-green-400">12</p>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">In Progress</h3>
                    <p class="text-xl font-bold text-blue-600 dark:text-blue-400">5</p>
                </div>
                <div class="bg-yellow-50 dark:bg-yellow-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Delayed</h3>
                    <p class="text-xl font-bold text-yellow-600 dark:text-yellow-400">2</p>
                </div>
                <div class="bg-red-50 dark:bg-red-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-red-800 dark:text-red-200">At Risk</h3>
                    <p class="text-xl font-bold text-red-600 dark:text-red-400">1</p>
                </div>
            </div>
        </div>



        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Project Activities</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th class="px-3 py-2 text-left">Activity</th>
                            <th class="px-3 py-2 text-left">Start Date</th>
                            <th class="px-3 py-2 text-left">End Date</th>
                            <th class="px-3 py-2 text-left">Status</th>
                            <th class="px-3 py-2 text-left">Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">Project Planning</td>
                            <td class="px-3 py-2">2024-01-01</td>
                            <td class="px-3 py-2">2024-01-15</td>
                            <td class="px-3 py-2"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Completed</span></td>
                            <td class="px-3 py-2">100%</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Resource Allocation</td>
                            <td class="px-3 py-2">2024-01-16</td>
                            <td class="px-3 py-2">2024-02-01</td>
                            <td class="px-3 py-2"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Completed</span></td>
                            <td class="px-3 py-2">100%</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Development Phase 1</td>
                            <td class="px-3 py-2">2024-02-02</td>
                            <td class="px-3 py-2">2024-04-01</td>
                            <td class="px-3 py-2"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">In
                                    Progress</span></td>
                            <td class="px-3 py-2">75%</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Testing</td>
                            <td class="px-3 py-2">2024-04-02</td>
                            <td class="px-3 py-2">2024-05-01</td>
                            <td class="px-3 py-2"><span
                                    class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Delayed</span></td>
                            <td class="px-3 py-2">30%</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Deployment</td>
                            <td class="px-3 py-2">2024-05-02</td>
                            <td class="px-3 py-2">2024-05-15</td>
                            <td class="px-3 py-2"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Not
                                    Started</span></td>
                            <td class="px-3 py-2">0%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Milestone Tracking</h2>
            <div class="space-y-3">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                    <div class="flex-1">
                        <p class="font-medium text-sm">Phase 1 Completion</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Target: April 1, 2024 | Status: On Track</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                    <div class="flex-1">
                        <p class="font-medium text-sm">Testing Completion</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Target: May 1, 2024 | Status: Delayed</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-gray-400 rounded-full mr-2"></div>
                    <div class="flex-1">
                        <p class="font-medium text-sm">Project Launch</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Target: May 15, 2024 | Status: Pending</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Key Questions Answered</h2>
            <ul class="space-y-1 text-sm">
                <li class="flex items-center">
                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span>
                    Are project milestones being hit on time? <strong class="ml-1">Mostly on track, 1 delayed</strong>
                </li>
                <li class="flex items-center">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>
                    Current activities in progress: <strong class="ml-1">Development Phase 1</strong>
                </li>
                <li class="flex items-center">
                    <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-2"></span>
                    Activities at risk: <strong class="ml-1">Testing phase needs attention</strong>
                </li>
            </ul>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            // Pie Chart for Activity Status Distribution
            const statusCtx = document.getElementById('activityStatusPieChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'pie',
                data: {
                    labels: ['Completed', 'In Progress', 'Delayed', 'At Risk'],
                    datasets: [{
                        data: [12, 5, 2, 1],
                        backgroundColor: [
                            '#10B981', // Green for Completed
                            '#3B82F6', // Blue for In Progress
                            '#F59E0B', // Yellow for Delayed
                            '#EF4444' // Red for At Risk
                        ],
                        hoverBackgroundColor: [
                            '#059669',
                            '#2563EB',
                            '#D97706',
                            '#DC2626'
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
                                    label += value + ' activities (' + percentage + '%)';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Bar Chart for Project Progress by Activity
            const progressCtx = document.getElementById('activityProgressBarChart').getContext('2d');
            new Chart(progressCtx, {
                type: 'bar',
                data: {
                    labels: ['Project Planning', 'Resource Allocation', 'Development Phase 1', 'Testing',
                        'Deployment'
                    ],
                    datasets: [{
                        label: 'Progress %',
                        data: [100, 100, 75, 30, 0],
                        backgroundColor: function(context) {
                            const value = context.dataset.data[context.dataIndex];
                            if (value === 100) return '#10B981'; // Green for completed
                            if (value >= 75) return '#3B82F6'; // Blue for good progress
                            if (value >= 50) return '#F59E0B'; // Yellow for moderate
                            if (value > 0) return '#F97316'; // Orange for low
                            return '#6B7280'; // Gray for not started
                        },
                        borderColor: function(context) {
                            const value = context.dataset.data[context.dataIndex];
                            if (value === 100) return '#059669';
                            if (value >= 75) return '#2563EB';
                            if (value >= 50) return '#D97706';
                            if (value > 0) return '#EA580C';
                            return '#4B5563';
                        },
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
                            max: 100,
                            ticks: {
                                font: {
                                    size: 9
                                },
                                callback: function(value) {
                                    return value + '%';
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
                            display: false
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
                                    return 'Progress: ' + context.parsed.y + '%';
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
