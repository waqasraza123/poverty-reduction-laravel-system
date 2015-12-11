<div class="problem-stats">

    <!-- Apply any bg-* class to to the info-box to color it -->
    <div class="info-box bg-red" style="background-color: #27AE60 !important;">
        <span class="info-box-icon"><i class="fa fa-database"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Total Problems</span>
            <span class="info-box-number total">{{$totalProblems}}</span>
        </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->

    <!-- Apply any bg-* class to to the info-box to color it -->
    <div class="info-box bg-red" style="background-color: #2980B9 !important;">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Solved Problems</span>
            <span class="info-box-number solved">{{$solvedProblems}}</span>
        </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->

    <!-- Apply any bg-* class to to the info-box to color it -->
    <div class="info-box bg-red" style="background-color: #2A3B4C !important;">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-down"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">UnSolved Problems</span>
            <span class="info-box-number unsolved">{{$unsolvedProblems}}</span>
        </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->

</div>