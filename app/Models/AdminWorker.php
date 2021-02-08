<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 22/1/19
 * Time: 7:30 PM
 */

namespace App\Models;
use DB;

class AdminWorker
{

    /**
     * Function for creating a category
     *
     * @param $name
     * @param $parent_category
     * @param $super_parent_category_id
     * @param $order
     * @return bool
     */
    public function createCategory($name, $parent_category, $super_parent_category_id, $order)
    {
       DB::table('reports_category')
           ->insert([
               'name' => $name,
               'parent_category_id' => $parent_category,
               'super_parent_category_id' => $super_parent_category_id,
               'order_by' => $order
           ]);

       return true;
    }


    /**
     * Function for creating a KPI category
     *
     * @param $name
     * @param $parent_category
     * @param $super_parent_category_id
     * @param $order
     * @return bool
     */
    public function createKpiCategory($name, $parent_category, $super_parent_category_id, $order)
    {
        DB::table('kpi_reports_category')
            ->insert([
                'name' => $name,
                'parent_category_id' => $parent_category,
                'super_parent_category_id' => $super_parent_category_id,
                'order_by' => $order
            ]);

        return true;
    }


    /**
     * Function for updating a category
     *
     * @param $category_id
     * @param $name
     * @param $parent_category
     * @param $super_parent_category_id
     * @param $order
     * @return bool
     */
    public function updateCategory($category_id, $name, $parent_category, $super_parent_category_id, $order)
    {
        DB::table('reports_category')
            ->where('category_id', $category_id)
            ->update([
                'name' => $name,
                'parent_category_id' => $parent_category,
                'super_parent_category_id' => $super_parent_category_id,
                'order_by' => $order
            ]);

        return true;
    }


    /**
     * Function for updating a KPI category
     *
     * @param $category_id
     * @param $name
     * @param $parent_category
     * @param $super_parent_category_id
     * @param $order
     * @return bool
     */
    public function updateKpiCategory($category_id, $name, $parent_category, $super_parent_category_id, $order)
    {
        DB::table('kpi_reports_category')
            ->where('category_id', $category_id)
            ->update([
                'name' => $name,
                'parent_category_id' => $parent_category,
                'super_parent_category_id' => $super_parent_category_id,
                'order_by' => $order
            ]);

        return true;
    }


    /**
     * Function for creating a report
     *
     * @param $tab
     * @param $category
     * @param $sub_category
     * @param $report_id
     * @param $section_id
     * @param $order
     * @param $container_size
     * @param int $report_height
     * @param string $status
     * @return bool
     */
    public function createReport($tab, $category, $sub_category, $report_id, $section_id, $order, $container_size, $report_height = 550, $status = 'enable')
    {
        DB::table('reports')
            ->insert(array(
                'sub_category_id' => $sub_category,
                'category_id' => $category,
                'tab_id' => $tab,
                'report_id' => $report_id,
                'section_id' => $section_id,
                'order_no' => $order,
                'container_size' => $container_size,
                'height' => $report_height,
                'status' => $status
            ));

        return true;
    }


    /**
     * Function for creating a KPI report
     *
     * @param $tab
     * @param $category
     * @param $sub_category
     * @param $report_id
     * @param $section_id
     * @param $order
     * @param $container_size
     * @param int $report_height
     * @param string $status
     * @return bool
     */
    public function createKpiReport($tab, $category, $sub_category, $report_id, $section_id, $order, $container_size, $report_height = 550, $status = 'enable')
    {
        DB::table('kpi_reports')
            ->insert(array(
                'sub_category_id' => $sub_category,
                'category_id' => $category,
                'tab_id' => $tab,
                'report_id' => $report_id,
                'section_id' => $section_id,
                'order_no' => $order,
                'container_size' => $container_size,
                'height' => $report_height,
                'status' => $status
            ));

        return true;
    }


    /**
     * Function for creating a report
     *
     * @param $id
     * @param $category
     * @param $tab
     * @param $sub_category
     * @param $report_id
     * @param $section_id
     * @param $order
     * @param $container_size
     * @param int $report_height
     * @param string $status
     * @return bool
     */
    public function updateReport($id, $category, $tab, $sub_category, $report_id, $section_id, $order, $container_size, $report_height = 550, $status = 'enable')
    {
        DB::table('reports')
            ->where('id', $id)
            ->update(array(
                'sub_category_id' => $sub_category,
                'category_id' => $category,
                'tab_id' => $tab,
                'report_id' => $report_id,
                'section_id' => $section_id,
                'order_no' => $order,
                'container_size' => $container_size,
                'height' => $report_height,
                'status' => $status
            ));

        return true;
    }


    /**
     * Function for creating a KPI report
     *
     * @param $id
     * @param $category
     * @param $tab
     * @param $sub_category
     * @param $report_id
     * @param $section_id
     * @param $order
     * @param $container_size
     * @param int $report_height
     * @param string $status
     * @return bool
     */
    public function updateKpiReport($id, $category, $tab, $sub_category, $report_id, $section_id, $order, $container_size, $report_height = 550, $status = 'enable')
    {
        DB::table('kpi_reports')
            ->where('id', $id)
            ->update(array(
                'sub_category_id' => $sub_category,
                'category_id' => $category,
                'tab_id' => $tab,
                'report_id' => $report_id,
                'section_id' => $section_id,
                'order_no' => $order,
                'container_size' => $container_size,
                'height' => $report_height,
                'status' => $status
            ));

        return true;
    }


    /**
     * Function for creating tab
     *
     * @param $name
     * @return bool
     */
    public function createTab($name)
    {
        DB::table('reports_category')
            ->insert([
                'name' => $name
            ]);

        return true;
    }


    /**
     * Function for creating kpi tab
     *
     * @param $name
     * @return bool
     */
    public function createKpiTab($name)
    {
        DB::table('kpi_reports_category')
            ->insert([
                'name' => $name
            ]);

        return true;
    }


    /**
     * Function for updating tab
     *
     * @param $tab_id
     * @param $name
     * @return bool
     */
    public function updateTab($tab_id, $name)
    {
        DB::table('reports_category')
            ->where('category_id', $tab_id)
            ->update([
                'name' => $name
            ]);

        return true;
    }


    /**
     * Function for updating KPI tab
     *
     * @param $tab_id
     * @param $name
     * @return bool
     */
    public function updateKpiTab($tab_id, $name)
    {
        DB::table('kpi_reports_category')
            ->where('category_id', $tab_id)
            ->update([
                'name' => $name
            ]);

        return true;
    }


    /**
     * Function for deleting a tab
     *
     * @param $tab_id
     * @return bool
     */
    public function deleteTab($tab_id)
    {
        DB::table('reports')
            ->where('tab_id', $tab_id)
            ->delete();

        DB::table('reports_category')
            ->where('category_id', $tab_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting a tab
     *
     * @param $tab_id
     * @return bool
     */
    public function deleteKpiTab($tab_id)
    {
        DB::table('kpi_reports')
            ->where('tab_id', $tab_id)
            ->delete();

        DB::table('kpi_reports_category')
            ->where('category_id', $tab_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting a category
     *
     * @param $category_id
     * @return bool
     */
    public function deleteCategory($category_id)
    {
        DB::table('reports')
            ->where('category_id', $category_id)
            ->delete();

        DB::table('reports_category')
            ->where('category_id', $category_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting a KPI category
     *
     * @param $category_id
     * @return bool
     */
    public function deleteKpiCategory($category_id)
    {
        DB::table('kpi_reports')
            ->where('category_id', $category_id)
            ->delete();

        DB::table('kpi_reports_category')
            ->where('category_id', $category_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting a sub category
     *
     * @param $subcategory_id
     * @return bool
     */
    public function deleteSubCategory($subcategory_id)
    {
        DB::table('reports')
            ->where('sub_category_id', $subcategory_id)
            ->delete();

        DB::table('reports_category')
            ->where('category_id', $subcategory_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting a kpi sub category
     *
     * @param $subcategory_id
     * @return bool
     */
    public function deleteKpiSubCategory($subcategory_id)
    {
        DB::table('kpi_reports')
            ->where('sub_category_id', $subcategory_id)
            ->delete();

        DB::table('kpi_reports_category')
            ->where('category_id', $subcategory_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting report
     *
     * @param $report_id
     * @return bool
     */
    public function deleteReport($report_id)
    {
        DB::table('reports')
            ->where('id', $report_id)
            ->delete();

        return true;
    }


    /**
     * Function for deleting KPI report
     *
     * @param $report_id
     * @return bool
     */
    public function deleteKpiReport($report_id)
    {
        DB::table('kpi_reports')
            ->where('id', $report_id)
            ->delete();

        return true;
    }

}