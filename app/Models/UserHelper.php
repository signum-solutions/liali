<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 23/1/19
 * Time: 1:12 PM
 */

namespace App\Models;
use DB;

class UserHelper
{

    /**
     * Function for getting category reports
     *
     * @param $sub_category_id
     * @return mixed
     */
    public function getCategoryReports($sub_category_id)
    {
        $reports = DB::table('reports')
            ->where('sub_category_id', $sub_category_id)
            ->where('status', 'enable')
            ->get();

        return $reports;
    }


    /**
     * Function for getting KPI category reports
     *
     * @param $sub_category_id
     * @return mixed
     */
    public function getKpiCategoryReports($sub_category_id)
    {
        $reports = DB::table('kpi_reports')
            ->where('sub_category_id', $sub_category_id)
            ->where('status', 'enable')
            ->get();

        return $reports;
    }


    /**
     * Function for getting information tab categories
     *
     * @return mixed
     */
    public function getInformationTabCategory()
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id', 6)
            ->get();

        return $categories;
    }


    /**
     * Function for getting analysis tab categories
     *
     * @param $category_id
     * @return mixed
     */
    public function getAnalysisTabCategory()
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id', 7)
            ->get();

        return $categories;
    }


    /**
     * Function for getting insight tab categories
     *
     * @param $category_id
     * @return mixed
     */
    public function getInsightTabCategory()
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id', 8)
            ->get();

        return $categories;
    }


    /**
     * Function for getting category iframes
     *
     * @param $category_id
     * @return mixed
     */
    public function getCategoryIframes($category_id)
    {
        $reports = DB::table('reports')
            ->where('sub_category_id', $category_id)
            ->get();

        return $reports;
    }


    /**
     * Function for getting category KPI iframes
     *
     * @param $category_id
     * @return mixed
     */
    public function getKpiCategoryIframes($category_id)
    {
        $reports = DB::table('kpi_reports')
            ->where('sub_category_id', $category_id)
            ->get();

        return $reports;
    }


    /**
     * Function for getting access tokens
     *
     * @return mixed
     */
    public function getAccessTokens()
    {
        $tokens = DB::table('tokens')
            ->where('id', 1)
            ->first();

        return $tokens;
    }


    /**
     * Function for checking tokens
     *
     * @param int $int
     * @return bool
     */
    public function checkTokens(int $int)
    {
        $count = DB::table('tokens')
            ->where('id', $int)
            ->count();

        if($count >= 1) {
            return true;
        } else {
            return false;
        }
    }


}