@extends('layouts.admin_home')

@section('content')
<body>
    <section id="dashboard" class="dashboard">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user-check"></i>
                        <span class="text">Total Students</span>
                        <span class="number">{{ $totalStudents }}</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-bill"></i>
                        <span class="text">Revenue</span>
                        <span class="number">{{ $revenue }}</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-file-check-alt"></i>
                        <span class="text">Approval Pending</span>
                        <span class="number">{{ $approvalPendingCount }}</span>
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <?php $perPageOptions = [5, 10, 15, 20]; // Options for number of users per page ?>
                        <?php $perPage = request()->get('per_page', $perPageOptions[0]); // Get the selected number of users per page from the URL or use the default value ?>
                        <?php $currentPage = request()->get('page', 1); // Get the current page number from the URL ?>
                        <?php $startIndex = ($currentPage - 1) * $perPage; // Calculate the starting index of the users for the current page ?>
                        <?php $recentUsers = $users->sortBy('created_at')->slice($startIndex, $perPage); ?>
                        <?php foreach ($recentUsers as $user): ?>
                            <span class="data-list"><?php echo $user->name; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="data type">
                        <span class="data-title">Student ID</span>
                        <?php foreach ($recentUsers as $user): ?>
                            <span class="data-list" style="text-transform: uppercase;"><?php echo $user->studentid; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <?php foreach ($recentUsers as $user): ?>
                            <span class="data-list"><?php echo $user->email; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <?php foreach ($recentUsers as $user): ?>
                            <span class="data-list"><?php echo $user->created_at->format('d M Y'); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="user-per-page">
                    <span class="text">Users per page:</span>
                    <select name="per_page" onchange="this.options[this.selectedIndex].value && (window.location = '{{ route('dashboard', ['per_page' => '__value__']) }}'.replace('__value__', this.options[this.selectedIndex].value))">
                        <?php foreach ($perPageOptions as $option): ?>
                            <option value="<?php echo $option; ?>" <?php echo ($option == $perPage) ? 'selected' : ''; ?>><?php echo $option; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="pagination">
                <?php $totalPages = ceil($users->count() / $perPage); ?>
                <?php if ($totalPages > 1): ?>
                    <a href="{{ route('dashboard', ['page' => max($currentPage - 1, 1), 'per_page' => $perPage]) }}" class="arrow prev">
                        <i class="uil uil-angle-left"></i>
                    </a>
                    <a href="{{ route('dashboard', ['page' => min($currentPage + 1, $totalPages), 'per_page' => $perPage]) }}" class="arrow next">
                        <i class="uil uil-angle-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="export-button">
            <a href="{{ route('export.data') }}" class="btn btn-custom">
                <i class='bx bx-export'></i>
                <i class='bx bx-export bx-tada'></i>
                Export Data
            </a>
        </div>
    </section>

    <script>
    
    </script>
</body>
@endsection

@section('styles')
<style>
	.dashboard{
        position: relative;
        left: 70px;
        background-color: var(--panel-color);
        min-height: 100vh;
        width: calc(100% - 80px);
        padding: 10px 14px;
        transition: var(--tran-05);
    }

    .dashboard .dash-content{
        padding-top: 50px;
    }
    .dash-content .title{
        display: flex;
        align-items: center;
        margin: 60px 0 30px 0;
    }
    .dash-content .title i{
        position: relative;
        height: 35px;
        width: 35px;
        background-color: var(--primary-color);
        border-radius: 6px;
        color: var(--title-icon-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    .dash-content .title .text{
        font-size: 24px;
        font-weight: 500;
        color: var(--text-color);
        margin-left: 10px;
    }
    .dash-content .boxes{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .dash-content .boxes .box{
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 12px;
        width: calc(100% / 3 - 100px);
        padding: 15px 20px;
        background-color: var(--box1-color);
        transition: var(--tran-05);
    }
    .boxes .box i{
        font-size: 35px;
        color: var(--text-color);
    }
    .boxes .box .text{
        white-space: nowrap;
        font-size: 18px;
        font-weight: 500;
        color: var(--text-color);
    }
    .boxes .box .number{
        font-size: 40px;
        font-weight: 500;
        color: var(--text-color);
    }
    .boxes .box.box2{
        background-color: var(--box2-color);
    }
    .boxes .box.box3{
        background-color: var(--box3-color);
    }
    .dash-content .activity .activity-data{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    .activity .activity-data{
        display: flex;
    }
    .activity-data .data{
        display: flex;
        flex-direction: column;
        margin: 0 15px;
    }
    .activity-data .data-title{
        font-size: 20px;
        font-weight: 500;
        color: var(--text-color);
    }
    .activity-data .data .data-list{
        font-size: 18px;
        font-weight: 400;
        margin-top: 20px;
        white-space: nowrap;
        color: var(--text-color);
    }

    .export-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    .btn-custom i.bx-export.bx-tada{
        display: none;
    }

    .btn-custom:hover i.bx-export{
        display: none;
    }

    .btn-custom:hover i.bx-export.bx-tada{
        display: inline-block;
    }

    .btn-custom {
        /* Customize the button styles as per your requirement */
        /* Example CSS: */
        background-color: #f8f9fa;
        color: #343a40;
        border-color: #6c757d;
    }

    .btn-custom:hover {
        /* Example CSS: */
        background-color: #e2e6ea;
        color: #343a40;
        border-color: #6c757d;
    }

    .user-per-page {
        position: absolute;
        top: 26.1rem;
        right: 0;
        margin-right: 15px;
        margin-top: 5px;
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #888;
    }

    .pagination {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .pagination .arrow {
        margin: 0 5px;
        font-size: 20px;
        color: #888;
        text-decoration: none;
    }

</style>
@endsection
