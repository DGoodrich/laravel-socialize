<?php

/**
 * Helper function for deleting a form
 *
 * @param $routeParams
 * @param string $label
 * @param string $class
 * @param bool $cancel
 * @return string
 */
function delete_form($routeParams, $label = 'Delete', $class = 'btn btn-danger', $cancel = false)
{
    $form = Form::open(['method' => 'DELETE', 'route' => $routeParams, 'class' => 'delete']);

    $form .= Form::hidden('id', '');

    $form .= Form::hidden('type', '');

    $form .= Form::submit($label, ['class' => $class]);

    if($cancel) {

        $form .= Form::button('No', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']);

    }

    return $form .= Form::close();
}

/**
 * Helper function for getting the date / time difference between two dates
 *
 * @param $datePosted
 * @return string
 */
function posted_date($datePosted)
{
    $current_date = Carbon\Carbon::now();

    $expiry_date = Carbon\Carbon::createFromFormat('Y-m-d H', date_format($datePosted, 'Y-m-d H'));

    $difference = $expiry_date->diffInHours($current_date);

    if($difference > 23)
    {
        $dayDiff = $expiry_date->diffInDays($current_date);

        if ($dayDiff > 1)
        {
            return $dayDiff. ' days ago';
        }

        return $dayDiff. ' day ago';
    }

    return $difference. ' hours ago';
}

function percentage($x, $y)
{

    if (!empty($x)) {
        $perc = $y/$x;

        return $perc * 100;
    }

    return 0;
}