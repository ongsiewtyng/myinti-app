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
                        <span class="number"><?php echo $totalStudents; ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Unread Messages</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-file-check-alt"></i>
                        <span class="text">Approval Pending</span>
                        <span class="number">10,120</span>
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
                    <?php foreach ($users as $user): ?>
                        <span class="data-list"><?php echo $user->name; ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data type">
                    <span class="data-title">Student ID</span>
                    <?php foreach ($users as $user): ?>
                    <span class="data-list" style="text-transform: uppercase;"><?php echo $user->studentid; ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data email">
                    <span class="data-title">Email</span>
                    <?php foreach ($users as $user): ?>
                        <span class="data-list"><?php echo $user->email; ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="data joined">
                    <span class="data-title">Joined</span>
                    <?php foreach ($users as $user): ?>
                        <span class="data-list"><?php echo $user->created_at->format('d M Y'); ?></span>
                    <?php endforeach; ?>
                </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    
    </script>
</body>


@section('styles')
<style>
	.dashboard{
        position: relative;
        left: 260px;
        background-color: var(--panel-color);
        min-height: 100vh;
        width: calc(100% - 250px);
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

</style>
@endsection
