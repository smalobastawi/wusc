@extends('layouts.dashboard')

@section('title', 'Milestones & Timeline Dashboard')

@section('content')
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Milestone Overview</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="bg-green-50 dark:bg-green-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-green-800 dark:text-green-200">Achieved</h3>
                    <p class="text-xl font-bold text-green-600 dark:text-green-400">8</p>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">On Track</h3>
                    <p class="text-xl font-bold text-blue-600 dark:text-blue-400">4</p>
                </div>
                <div class="bg-yellow-50 dark:bg-yellow-900 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">At Risk</h3>
                    <p class="text-xl font-bold text-yellow-600 dark:text-yellow-400">2</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-200">Upcoming</h3>
                    <p class="text-xl font-bold text-gray-600 dark:text-gray-400">3</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Project Timeline & Progress Trends</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-base font-medium mb-1">Monthly Progress Trend</h3>
                    <div class="chart-container" style="height: 220px">
                        <canvas id="progressTrendChart"></canvas>
                    </div>
                </div>
                <div>
                    <h3 class="text-base font-medium mb-1">Milestone Achievement Rate</h3>
                    <div class="chart-container" style="height: 220px">
                        <canvas id="milestoneRateChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Activity Timeline Gantt View</h2>
            <div class="mb-3">
                <div class="chart-container" style="height: 300px">
                    <canvas id="ganttChart"></canvas>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Upcoming Milestones</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th class="px-3 py-2 text-left">Milestone</th>
                            <th class="px-3 py-2 text-left">Target Date</th>
                            <th class="px-3 py-2 text-left">Dependencies</th>
                            <th class="px-3 py-2 text-left">Risk Level</th>
                            <th class="px-3 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">Complete Testing Phase</td>
                            <td class="px-3 py-2">May 1, 2024</td>
                            <td class="px-3 py-2">Development Phase 1</td>
                            <td class="px-3 py-2"><span
                                    class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Medium</span></td>
                            <td class="px-3 py-2"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">In
                                    Progress</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">User Acceptance Testing</td>
                            <td class="px-3 py-2">May 10, 2024</td>
                            <td class="px-3 py-2">Testing Phase</td>
                            <td class="px-3 py-2"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Low</span></td>
                            <td class="px-3 py-2"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Not
                                    Started</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Production Deployment</td>
                            <td class="px-3 py-2">May 15, 2024</td>
                            <td class="px-3 py-2">UAT, Documentation</td>
                            <td class="px-3 py-2"><span
                                    class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Medium</span></td>
                            <td class="px-3 py-2"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Not
                                    Started</span></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">Post-Launch Review</td>
                            <td class="px-3 py-2">June 1, 2024</td>
                            <td class="px-3 py-2">Production Deployment</td>
                            <td class="px-3 py-2"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Low</span></td>
                            <td class="px-3 py-2"><span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Not
                                    Started</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-3">Resource Allocation Timeline</h2>
            <div class="chart-container" style="height: 220px">
                <canvas id="resourceChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            // Monthly Progress Trend Line Chart
            const progressTrendCtx = document.getElementById('progressTrendChart').getContext('2d');
            new Chart(progressTrendCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Planned Progress',
                        data: [10, 25, 40, 60, 80, 100],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.3,
                        borderWidth: 1.5
                    }, {
                        label: 'Actual Progress',
                        data: [8, 20, 35, 55, 70, null],
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.3,
                        borderWidth: 1.5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                                    if (context.parsed.y !== null) {
                                        label += context.parsed.y + '%';
                                    }
                                    return label;
                                }
                            }
                        }
                    },
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
                    }
                }
            });

            // Milestone Achievement Rate Bar Chart
            const milestoneRateCtx = document.getElementById('milestoneRateChart').getContext('2d');
            new Chart(milestoneRateCtx, {
                type: 'bar',
                data: {
                    labels: ['Q1 2024', 'Q2 2024', 'Q3 2024', 'Q4 2024'],
                    datasets: [{
                        label: 'Target Milestones',
                        data: [5, 6, 4, 2],
                        backgroundColor: '#E5E7EB',
                        borderColor: '#9CA3AF',
                        borderWidth: 1
                    }, {
                        label: 'Achieved Milestones',
                        data: [5, 3, 0, 0],
                        backgroundColor: '#10B981',
                        borderColor: '#059669',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 9
                                },
                                stepSize: 1
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 9
                                }
                            }
                        }
                    }
                }
            });

            // Gantt-style Activity Timeline Chart
            const ganttCtx = document.getElementById('ganttChart').getContext('2d');
            new Chart(ganttCtx, {
                type: 'bar',
                data: {
                    labels: ['Planning', 'Design', 'Development', 'Testing', 'Deployment', 'Maintenance'],
                    datasets: [{
                        label: 'Start',
                        data: [0, 15, 45, 90, 120, 135],
                        backgroundColor: 'transparent',
                        stack: 'Stack 0',
                    }, {
                        label: 'Duration',
                        data: [15, 30, 45, 30, 15, 30],
                        backgroundColor: [
                            '#10B981', // Green for completed
                            '#10B981', // Green for completed
                            '#3B82F6', // Blue for in progress
                            '#F59E0B', // Yellow for delayed
                            '#6B7280', // Gray for not started
                            '#6B7280' // Gray for not started
                        ],
                        stack: 'Stack 0',
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
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
                                    if (context.datasetIndex === 0) return '';
                                    const activity = context.label;
                                    const start = context.dataset.data[context.dataIndex - 1] || 0;
                                    const duration = context.parsed.x;
                                    return activity + ': Day ' + start + ' to Day ' + (start +
                                    duration);
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            ticks: {
                                font: {
                                    size: 9
                                }
                            },
                            title: {
                                display: true,
                                text: 'Project Days',
                                font: {
                                    size: 10
                                }
                            }
                        },
                        y: {
                            stacked: true,
                            ticks: {
                                font: {
                                    size: 9
                                }
                            }
                        }
                    }
                }
            });

            // Resource Allocation Timeline
            const resourceCtx = document.getElementById('resourceChart').getContext('2d');
            new Chart(resourceCtx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7',
                        'Week 8'],
                    datasets: [{
                        label: 'Developers',
                        data: [5, 5, 8, 8, 10, 10, 6, 4],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.3,
                        borderWidth: 1.5
                    }, {
                        label: 'Testers',
                        data: [0, 0, 2, 3, 4, 6, 6, 3],
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.3,
                        borderWidth: 1.5
                    }, {
                        label: 'DevOps',
                        data: [1, 1, 1, 2, 2, 3, 4, 2],
                        borderColor: '#F59E0B',
                        backgroundColor: 'rgba(245, 158, 11, 0.1)',
                        tension: 0.3,
                        borderWidth: 1.5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                                    label += context.parsed.y + ' people';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 9
                                }
                            },
                            title: {
                                display: true,
                                text: 'Number of Resources',
                                font: {
                                    size: 10
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
