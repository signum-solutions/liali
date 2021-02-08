<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 21/1/19
 * Time: 10:27 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\AdminHelper;
use App\Models\AdminWorker;
use App\Models\LoginHelper;
use App\Models\LoginWorker;
USE App\User;

class AdminController extends BaseController
{

    /**
     * Function for getting login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoginPage()
    {
        return view('contents.admin.login');
    }
    
     public function clientlist()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => User::all()
        );

        return view('contents.admin.clients')->with('data', $data);
    }


    /**
     * Function for checking login information
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkLogin(Request $request)
    {
        $user_name = $request->input('user-name');
        $password = $request->input('password');

        $login_helper = new LoginHelper();
        $result = $login_helper->checkLogin($user_name, $password);

        if ($result != false && isset($result->status) && $result->status == 1) {
            $request->session()->put('user_id', $result->user_id);
            $request->session()->put('user_type', $result->user_type);
            $request->session()->flash('alert-type', 'success');
            $request->session()->flash('message', 'Logged in successfully');
            return redirect('/admin/dashboard');
            
        }elseif(isset($result->status) && $result->status == 0){
            $request->session()->flash('alert-type', 'warning');
            $request->session()->flash('message', 'Account Not Activated');
            return redirect('/');
        } else {
            $request->session()->flash('alert-type', 'warning');
            $request->session()->flash('message', 'Username or password is incorrect');
            return redirect('/');
        }
    }

    public function usercheckLogin(Request $request)
    {
        $user_name = $request->input('user-name');
        $password = $request->input('password');

        $login_helper = new LoginHelper();
        $result = $login_helper->checkLogin($user_name, $password);

        if ($result != false) {
            $request->session()->put('user_id', $result->user_id);
            $request->session()->put('user_type', $result->user_type);
            $request->session()->flash('alert-type', 'success');
            $request->session()->flash('message', 'Logged in successfully');
            return redirect('/home');

        } else {
            $request->session()->flash('alert-type', 'warning');
            $request->session()->flash('message', 'Username or password is incorrect');
            return redirect('/');
        }
    }

    /**
     * Function for getting admin dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        $data = array(
            'user_type' => 'admin'
        );

        return view('contents.admin.dashboard')->with('data', $data);
    }

    
    public function useredit($user_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_id' => $user_id,
            'user_type' => 'admin',
            'tab_data' => User::find($user_id)
        );

        return view('contents.admin.useredit')->with('data', $data);
    }

    public function updateclient(Request $request)
    {
        $userupdate = User::find($request->userid);
        $userupdate->update($request->all());
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => User::all()
        );

        return view('contents.admin.clients')->with('data', $data);
    }


    /**
     * Function for getting report list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listReportPage()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'report_list' => $admin_helper->getReportList()
        );

        return view('contents.admin.list_report')->with('data', $data);
    }


    /**
     * Function for getting KPI report list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listKpiReportPage()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'report_list' => $admin_helper->getKpiReportList()
        );

        return view('contents.admin.list_kpi_report')->with('data', $data);
    }


    /**
     * Function for getting add report page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addReportPage()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getReportsTabList()
        );

        return view('contents.admin.add_report')->with('data', $data);
    }


    /**
     * Function for getting add report page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addKpiReportPage()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getKpiReportsTabList()
        );

        return view('contents.admin.add_kpi_report')->with('data', $data);
    }


    /**
     * Function for adding report
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addReport(Request $request)
    {
        $admin_worker = new AdminWorker();

        $tab = $request->input('tab');
        $category = $request->input('category');
        $sub_category = $request->input('sub_category');
        $report_id = $request->input('report_id');
        $section_id = $request->input('section_id');
        $order = $request->input('order');
        $container_size = $request->input('container_size');
        $status = $request->input('status');
        $report_height = $request->input('report_height');

        $admin_worker->createReport($tab, $category, $sub_category, $report_id, $section_id, $order, $container_size, $report_height, $status);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Report added successfully');
        return redirect('/admin/listreport');
    }


    /**
     * Function for adding report
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addKpiReport(Request $request)
    {
        $admin_worker = new AdminWorker();

        $tab = $request->input('tab');
        $category = $request->input('category');
        $sub_category = $request->input('sub_category');
        $report_id = $request->input('report_id');
        $section_id = $request->input('section_id');
        $order = $request->input('order');
        $container_size = $request->input('container_size');
        $status = $request->input('status');
        $report_height = $request->input('report_height');

        $admin_worker->createKpiReport($tab, $category, $sub_category, $report_id, $section_id, $order, $container_size, $report_height, $status);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Report added successfully');
        return redirect('/admin/listkpireport');
    }


    /**
     * Function for getting update report page
     *
     * @param $report_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateReportPage($report_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getReportsTabList(),
            'report_data' => $admin_helper->getReportData($report_id)
        );

        if(isset($data['report_data']->tab_id) && !empty($data['report_data']->tab_id))
        {
            $data['category_list'] = $admin_helper->getTabCategories($data['report_data']->tab_id);
        }

        if(isset($data['report_data']->category_id) && !empty($data['report_data']->category_id))
        {
            $data['sub_category_list'] = $admin_helper->getCategorySubCategories($data['report_data']->category_id);
        }

        return view('contents.admin.update_report')->with('data', $data);
    }


    /**
     * Function for getting update report page
     *
     * @param $report_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateKpiReportPage($report_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getKpiReportsTabList(),
            'report_data' => $admin_helper->getKpiReportData($report_id)
        );

        if(isset($data['report_data']->tab_id) && !empty($data['report_data']->tab_id))
        {
            $data['category_list'] = $admin_helper->getKpiTabCategories($data['report_data']->tab_id);
        }

        if(isset($data['report_data']->category_id) && !empty($data['report_data']->category_id))
        {
            $data['sub_category_list'] = $admin_helper->getKpiCategorySubCategories($data['report_data']->category_id);
        }

        return view('contents.admin.update_kpi_report')->with('data', $data);
    }


    /**
     * Function for updating report
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateReport(Request $request)
    {
        $admin_worker = new AdminWorker();

        $id = $request->input('id');
        $tab_id = $request->input('tab');
        $category = $request->input('category');
        $sub_category = $request->input('sub_category');
        $report_id = $request->input('report_id');
        $section_id = $request->input('section_id');
        $order = $request->input('order');
        $container_size = $request->input('container_size');
        $status = $request->input('status');
        $report_height = $request->input('report_height');

        $admin_worker->updateReport($id, $category, $tab_id, $sub_category, $report_id, $section_id, $order, $container_size, $report_height, $status);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Report updated successfully');
        return redirect('/admin/listreport');
    }


    /**
     * Function for updating report
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateKpiReport(Request $request)
    {
        $admin_worker = new AdminWorker();

        $id = $request->input('id');
        $tab_id = $request->input('tab');
        $category = $request->input('category');
        $sub_category = $request->input('sub_category');
        $report_id = $request->input('report_id');
        $section_id = $request->input('section_id');
        $order = $request->input('order');
        $container_size = $request->input('container_size');
        $status = $request->input('status');
        $report_height = $request->input('report_height');

        $admin_worker->updateKpiReport($id, $category, $tab_id, $sub_category, $report_id, $section_id, $order, $container_size, $report_height, $status);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Report updated successfully');
        return redirect('/admin/listkpireport');
    }


    /**
     * Function for deleting report page
     *
     * @param Request $request
     * @param $report_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteReport(Request $request, $report_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteReport($report_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Report deleted successfully');
        return redirect('/admin/listreport');
    }


    /**
     * Function for deleting report page
     *
     * @param Request $request
     * @param $report_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteKpiReport(Request $request, $report_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteKpiReport($report_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Report deleted successfully');
        return redirect('/admin/listkpireport');
    }


    /**
     * Function for getting list category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listSubCategoryPage()
    {
        $admin_helper = new AdminHelper();
        $data = array(
            'user_type' => 'admin',
            'category_list' => $admin_helper->getSubCategoryList()
        );

        return view('contents.admin.list_sub_category')->with('data', $data);
    }


    /**
     * Function for getting list category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listKpiSubCategoryPage()
    {
        $admin_helper = new AdminHelper();
        $data = array(
            'user_type' => 'admin',
            'category_list' => $admin_helper->getKpiSubCategoryList()
        );

        return view('contents.admin.list_kpi_sub_category')->with('data', $data);
    }


    /**
     * Function for getting add category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addSubCategoryPage()
    {
        $admin_helper = new AdminHelper();
        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getReportsTabList()
        );

        return view('contents.admin.add_sub_category')->with('data', $data);
    }


    /**
     * Function for getting add category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addKpiSubCategoryPage()
    {
        $admin_helper = new AdminHelper();
        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getKpiReportsTabList()
        );

        return view('contents.admin.add_kpi_sub_category')->with('data', $data);
    }


    /**
     * Function for getting tab categories select options
     *
     * @param Request $request
     * @return false|string
     */
    public function getTabCategories(Request $request)
    {
        $tab_id = $request->input('tab_id');

        $admin_helper = new AdminHelper();
        $categories = $admin_helper->getTabCategories($tab_id);

        $select_options = '<option value="">Select Parent Category</option>';
        if(isset($categories) && !empty($categories))
        {
            foreach ($categories as $category)
            {
                $select_options .= '<option value="'.$category->category_id.'">'. $category->name . '</option>';
            }
        }

        echo $select_options;
        exit(0);
    }


    /**
     * Function for getting KPI tab categories select options
     *
     * @param Request $request
     * @return false|string
     */
    public function getKpiTabCategories(Request $request)
    {
        $tab_id = $request->input('tab_id');

        $admin_helper = new AdminHelper();
        $categories = $admin_helper->getKpiTabCategories($tab_id);

        $select_options = '<option value="">Select Parent Category</option>';
        if(isset($categories) && !empty($categories))
        {
            foreach ($categories as $category)
            {
                $select_options .= '<option value="'.$category->category_id.'">'. $category->name . '</option>';
            }
        }

        echo $select_options;
        exit(0);
    }


    /**
     * Function for getting sub categories of a category
     *
     * @param Request $request
     */
    public function getCategorySubCategories(Request $request)
    {
        $category_id = $request->input('category_id');

        $admin_helper = new AdminHelper();
        $categories = $admin_helper->getCategorySubCategories($category_id);

        $select_options = '<option value="">Select Category</option>';
        if(isset($categories) && !empty($categories))
        {
            foreach ($categories as $category)
            {
                $select_options .= '<option value="'.$category->category_id.'">'. $category->name . '</option>';
            }
        }

        echo $select_options;
        exit(0);
    }


    /**
     * Function for getting sub categories of a category
     *
     * @param Request $request
     */
    public function getKpiCategorySubCategories(Request $request)
    {
        $category_id = $request->input('category_id');

        $admin_helper = new AdminHelper();
        $categories = $admin_helper->getKpiCategorySubCategories($category_id);

        $select_options = '<option value="">Select Category</option>';
        if(isset($categories) && !empty($categories))
        {
            foreach ($categories as $category)
            {
                $select_options .= '<option value="'.$category->category_id.'">'. $category->name . '</option>';
            }
        }

        echo $select_options;
        exit(0);
    }


    /**
     * Function for adding category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addSubCategory(Request $request)
    {
        $tab = $request->input('tab');
        $parent_category = $request->input('parent_category');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->createCategory($name, $parent_category, $tab, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category added successfully');
        return redirect('/admin/listsubcategory');
    }


    /**
     * Function for adding category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addKpiSubCategory(Request $request)
    {
        $tab = $request->input('tab');
        $parent_category = $request->input('parent_category');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->createKpiCategory($name, $parent_category, $tab, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category added successfully');
        return redirect('/admin/listkpisubcategory');
    }


    /**
     * Function for logging user out'
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin/login');
    }


    /**
     * Function for getting list tabs page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function listTabs()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getReportsTabList()
        );

        return view('contents.admin.list_tabs')->with('data', $data);
    }


    /**
     * Function for getting list kpi tabs page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function listKpiTabs()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getKpiReportsTabList()
        );

        return view('contents.admin.list_kpi_tabs')->with('data', $data);
    }


    /**
     * Function for getting add tab page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addTabPage()
    {
        $data = array(
            'user_type' => 'admin'
        );

        return view('contents.admin.add_tab')->with('data', $data);
    }


    /**
     * Function for getting add kpi tab page
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addKpiTabPage()
    {
        $data = array(
            'user_type' => 'admin'
        );

        return view('contents.admin.add_kpi_tab')->with('data', $data);
    }


    /**
     * Function for adding tab
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addTab(Request $request)
    {
        $name = $request->input('name');

        $admin_worker = new AdminWorker();
        $admin_worker->createTab($name);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Tab added successfully');
        return redirect('/admin/listtabs');
    }


    /**
     * Function for adding tab
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addKpiTab(Request $request)
    {
        $name = $request->input('name');

        $admin_worker = new AdminWorker();
        $admin_worker->createKpiTab($name);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Tab added successfully');
        return redirect('/admin/listkpitabs');
    }


    /**
     * Function for getting update tab page
     *
     * @param $tab_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateTabPage($tab_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'tab_id' => $tab_id,
            'user_type' => 'admin',
            'tab_data' => $admin_helper->getTabData($tab_id)
        );

        return view('contents.admin.update_tab')->with('data', $data);
    }


    /**
     * Function for getting update tab page
     *
     * @param $tab_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateKpiTabPage($tab_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'tab_id' => $tab_id,
            'user_type' => 'admin',
            'tab_data' => $admin_helper->getKpiTabData($tab_id)
        );

        return view('contents.admin.update_kpi_tab')->with('data', $data);
    }


    /**
     * Function for updating tab
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTab(Request $request)
    {
        $admin_worker = new AdminWorker();

        $tab_id = $request->input('tab_id');
        $name = $request->input('name');

        $admin_worker->updateTab($tab_id, $name);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Tab updated successfully');
        return redirect('/admin/listtabs');
    }


    /**
     * Function for updating KPI tab
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateKpiTab(Request $request)
    {
        $admin_worker = new AdminWorker();

        $tab_id = $request->input('tab_id');
        $name = $request->input('name');

        $admin_worker->updateKpiTab($tab_id, $name);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Tab updated successfully');
        return redirect('/admin/listkpitabs');
    }


    /**
     * Function for deleting a tab
     *
     * @param Request $request
     * @param $tab_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteTab(Request $request, $tab_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteTab($tab_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Tab deleted successfully');
        return redirect('/admin/listtabs');
    }


    /**
     * Function for deleting a tab
     *
     * @param Request $request
     * @param $tab_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteKpiTab(Request $request, $tab_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteKpiTab($tab_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Tab deleted successfully');
        return redirect('/admin/listkpitabs');
    }


    /**
     * Function for getting list category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCategory()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'category_list' => $admin_helper->getCategoryList()
        );

        return view('contents.admin.list_category')->with('data', $data);
    }


    /**
     * Function for getting list KPI category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listKpiCategory()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'category_list' => $admin_helper->getKpiCategoryList()
        );

        return view('contents.admin.list_kpi_category')->with('data', $data);
    }


    /**
     * Function for getting add category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCategoryPage()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getReportsTabList()
        );

        return view('contents.admin.add_category')->with('data', $data);
    }


    /**
     * Function for getting add kpi category page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addKpiCategoryPage()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'user_type' => 'admin',
            'tab_list' => $admin_helper->getKpiReportsTabList()
        );

        return view('contents.admin.add_kpi_category')->with('data', $data);
    }


    /**
     * Function for adding category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addCategory(Request $request)
    {
        $tab = $request->input('tab');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->createCategory($name, $tab, null, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category added successfully');
        return redirect('/admin/listcategory');
    }


    /**
     * Function for adding KPI category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addKpiCategory(Request $request)
    {
        $tab = $request->input('tab');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->createKpiCategory($name, $tab, null, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category added successfully');
        return redirect('/admin/listkpicategory');
    }


    /**
     * Function for getting update category page
     *
     * @param $category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateCategoryPage($category_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'category_id' => $category_id,
            'user_type' => 'admin',
            'category_data' => $admin_helper->getCategoryData($category_id),
            'tab_list' => $admin_helper->getReportsTabList()
        );

        return view('contents.admin.update_category')->with('data', $data);
    }


    /**
     * Function for getting update category page
     *
     * @param $category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateKpiCategoryPage($category_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'category_id' => $category_id,
            'user_type' => 'admin',
            'category_data' => $admin_helper->getKpiCategoryData($category_id),
            'tab_list' => $admin_helper->getKpiReportsTabList()
        );

        return view('contents.admin.update_kpi_category')->with('data', $data);
    }


    /**
     * Function for updating category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateCategory(Request $request)
    {
        $category_id = $request->input('category_id');
        $tab = $request->input('tab');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->updateCategory($category_id, $name, $tab, null, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category updated successfully');
        return redirect('/admin/listcategory');
    }


    /**
     * Function for updating category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateKpiCategory(Request $request)
    {
        $category_id = $request->input('category_id');
        $tab = $request->input('tab');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->updateKpiCategory($category_id, $name, $tab, null, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category updated successfully');
        return redirect('/admin/listkpicategory');
    }


    /**
     * Function for deleting category
     *
     * @param Request $request
     * @param $category_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteCategory(Request $request, $category_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteCategory($category_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category deleted successfully');
        return redirect('/admin/listcategory');
    }


    /**
     * Function for deleting category
     *
     * @param Request $request
     * @param $category_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteKpiCategory(Request $request, $category_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteKpiCategory($category_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Category deleted successfully');
        return redirect('/admin/listkpicategory');
    }


    /**
     * Function for updating sub category page
     *
     * @param $subcategory_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateSubCategoryPage($subcategory_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'subcategory_id' => $subcategory_id,
            'user_type' => 'admin',
            'subcategory_data' => $admin_helper->getSubCategoryData($subcategory_id),
            'tab_list' => $admin_helper->getReportsTabList()
        );

        if(isset($data['subcategory_data']->super_parent_category_id)) {
            $data['categories'] = $admin_helper->getTabCategories($data['subcategory_data']->super_parent_category_id);
        }

        return view('contents.admin.update_sub_category')->with('data', $data);
    }


    /**
     * Function for updating sub category page
     *
     * @param $subcategory_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateKpiSubCategoryPage($subcategory_id)
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'subcategory_id' => $subcategory_id,
            'user_type' => 'admin',
            'subcategory_data' => $admin_helper->getKpiSubCategoryData($subcategory_id),
            'tab_list' => $admin_helper->getKpiReportsTabList()
        );

        if(isset($data['subcategory_data']->super_parent_category_id)) {
            $data['categories'] = $admin_helper->getKpiTabCategories($data['subcategory_data']->super_parent_category_id);
        }

        return view('contents.admin.update_kpi_sub_category')->with('data', $data);
    }


    /**
     * Function for updating sub category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateSubCategory(Request $request)
    {
        $category_id = $request->input('sub_category_id');
        $parent_category = $request->input('parent_category');
        $tab = $request->input('tab');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->updateCategory($category_id, $name, $parent_category, $tab, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Sub updated successfully');
        return redirect('/admin/listsubcategory');
    }


    /**
     * Function for updating sub category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateKpiSubCategory(Request $request)
    {
        $category_id = $request->input('sub_category_id');
        $parent_category = $request->input('parent_category');
        $tab = $request->input('tab');
        $name = $request->input('name');
        $order = $request->input('order');

        $admin_worker = new AdminWorker();
        $admin_worker->updateKpiCategory($category_id, $name, $parent_category, $tab, $order);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Sub updated successfully');
        return redirect('/admin/listkpisubcategory');
    }


    /**
     * Function for deleting sub category
     *
     * @param Request $request
     * @param $subcategory_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteSubCategory(Request $request, $subcategory_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteSubCategory($subcategory_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Sub Category deleted successfully');
        return redirect('/admin/listsubcategory');
    }


    /**
     * Function for deleting KPI sub category
     *
     * @param Request $request
     * @param $subcategory_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteKpiSubCategory(Request $request, $subcategory_id)
    {
        $admin_worker = new AdminWorker();
        $admin_worker->deleteKpiSubCategory($subcategory_id);

        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Sub Category deleted successfully');
        return redirect('/admin/listkpisubcategory');
    }



}
