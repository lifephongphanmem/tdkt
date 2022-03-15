<?php

function getHeThongChung() {
    return  \App\HeThongChung::all()->first() ?? new \App\HeThongChung();
}
