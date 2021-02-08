<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 22/1/19
 * Time: 7:30 PM
 */

namespace App\Models;
use DB;


class AdminHelper
{

    /**
     * Function for getting report tab list
     *
     * @return mixed
     */
    public function getReportsTabList()
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id', 0)
            ->where('super_parent_category_id', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting kpi report tab list
     *
     * @return mixed
     */
    public function getKpiReportsTabList()
    {
        $categories = DB::table('kpi_reports_category')
            ->where('parent_category_id', 0)
            ->where('super_parent_category_id', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting categories of a tab
     *
     * @param $tab_id
     * @return mixed
     */
    public function getTabCategories($tab_id)
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id', $tab_id)
            ->where('super_parent_category_id', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting KPI categories of a tab
     *
     * @param $tab_id
     * @return mixed
     */
    public function getKpiTabCategories($tab_id)
    {
        $categories = DB::table('kpi_reports_category')
            ->where('parent_category_id', $tab_id)
            ->where('super_parent_category_id', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting sub category list
     *
     * @return mixed
     */
    public function getSubCategoryList()
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id','!=', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting sub category list
     *
     * @return mixed
     */
    public function getKpiSubCategoryList()
    {
        $categories = DB::table('kpi_reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id','!=', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting category list
     *
     * @return mixed
     */
    public function getCategoryList()
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting KPI category list
     *
     * @return mixed
     */
    public function getKpiCategoryList()
    {
        $categories = DB::table('kpi_reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting category data
     *
     * @return mixed
     */
    public function getCategoryData($category_id)
    {
        $category = DB::table('reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id', 0)
            ->where('category_id', $category_id)
            ->first();

        return $category;
    }


    /**
     * Function for getting category data
     *
     * @return mixed
     */
    public function getKpiCategoryData($category_id)
    {
        $category = DB::table('kpi_reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id', 0)
            ->where('category_id', $category_id)
            ->first();

        return $category;
    }


    /**
     * Function for getting a category name
     *
     * @param $category_id
     * @return mixed
     */
    public function getCategoryName($category_id)
    {
        $category = DB::table('reports_category')
            ->select('name')
            ->where('category_id', $category_id)
            ->first();
        if(isset($category->name))
          return $category->name;
    }


    /**
     * Function for getting sub categories of a category
     *
     * @param $category_id
     * @return mixed
     */
    public function getCategorySubCategories($category_id)
    {
        $categories = DB::table('reports_category')
            ->where('parent_category_id', $category_id)
            ->where('super_parent_category_id','!=', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting KPI sub categories of a category
     *
     * @param $category_id
     * @return mixed
     */
    public function getKpiCategorySubCategories($category_id)
    {
        $categories = DB::table('kpi_reports_category')
            ->where('parent_category_id', $category_id)
            ->where('super_parent_category_id','!=', 0)
            ->orderBy('order_by', 'ASC')
            ->get();

        return $categories;
    }


    /**
     * Function for getting report list
     *
     * @return mixed
     */
    public function getReportList()
    {
        $reports =  DB::table('reports')
            ->get();

        return $reports;
    }


    /**
     * Function for getting KPI report list
     *
     * @return mixed
     */
    public function getKpiReportList()
    {
        $reports =  DB::table('kpi_reports')
            ->get();

        return $reports;
    }


    /**
     * Function for getting tab data
     *
     * @param $tab_id
     * @return mixed
     */
    public function getTabData($tab_id)
    {
        $tab = DB::table('reports_category')
            ->where('parent_category_id', 0)
            ->where('super_parent_category_id', 0)
            ->where('category_id', $tab_id)
            ->first();

        return $tab;
    }


    /**
     * Function for getting kpi tab data
     *
     * @param $tab_id
     * @return mixed
     */
    public function getKpiTabData($tab_id)
    {
        $tab = DB::table('kpi_reports_category')
            ->where('parent_category_id', 0)
            ->where('super_parent_category_id', 0)
            ->where('category_id', $tab_id)
            ->first();

        return $tab;
    }


    /**
     * Function for getting sub category data
     *
     * @param $subcategory_id
     * @return mixed
     */
    public function getSubCategoryData($subcategory_id)
    {
        $sub_category = DB::table('reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id','!=', 0)
            ->where('category_id', $subcategory_id)
            ->first();

        return $sub_category;
    }


    /**
     * Function for getting sub category data
     *
     * @param $subcategory_id
     * @return mixed
     */
    public function getKpiSubCategoryData($subcategory_id)
    {
        $sub_category = DB::table('kpi_reports_category')
            ->where('parent_category_id','!=', 0)
            ->where('super_parent_category_id','!=', 0)
            ->where('category_id', $subcategory_id)
            ->first();

        return $sub_category;
    }


    /**
     * Function for getting report data
     *
     * @param $report_id
     * @return mixed
     */
    public function getReportData($report_id)
    {
        $report = DB::table('reports')
            ->where('id', $report_id)
            ->first();

        return $report;
    }


    /**
     * Function for getting report data
     *
     * @param $report_id
     * @return mixed
     */
    public function getKpiReportData($report_id)
    {
        $report = DB::table('kpi_reports')
            ->where('id', $report_id)
            ->first();

        return $report;
    }


}