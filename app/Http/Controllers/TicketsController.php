<?php
namespace App\Http\Controllers;

use App\Mail\Ticket;
use App\Models\Tickets;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Mail;
use Input;
use Redirect;
use Validator;

class TicketsController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'tickets';
	static $per_page = '10';
    /**
     * @var DataService
     */
    private $dataService;

    public function __construct(DataService $dataService) {

		parent::__construct();
		$this->model = new Tickets();

		$this->info = $this->model->makeInfo($this->module);
		$this->access = array();

		$this->data = array(
			'pageTitle' => $this->info['title'],
			'pageNote' => $this->info['note'],
			'pageModule' => 'tickets',
			'return' => self::returnUrl(),

		);

        $this->dataService = $dataService;
    }

	public function getIndex(Request $request) {
		// Make Sure users Logged
		if (!\Auth::check()) {
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext', 'You are not login');
		}

		$this->access = $this->model->validAccess($this->info['id'], session('gid'));
		if ($this->access['is_view'] == 0) {
			return redirect('dashboard')->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus', 'error');
		}

		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : 'id');
		$order = (!is_null($request->input('order')) ? $request->input('order') : 'asc');
		// End Filter sort and order for query
		// Filter Search for query
		$filter = '';
		if (!is_null($request->input('search'))) {
			$search = $this->buildSearch('maps');
			$filter = $search['param'];
			$this->data['search_map'] = $search['maps'];
		}

		$page = $request->input('page', 1);
		$params = array(
			'page' => $page,
			'limit' => (!is_null($request->input('rows')) ? filter_var($request->input('rows'), FILTER_VALIDATE_INT) : static::$per_page),
			'sort' => $sort,
			'order' => $order,
			'params' => $filter,
			'global' => (isset($this->access['is_global']) ? $this->access['is_global'] : 0),
		);


		// Get Query
		$results = $this->model->getRows($params, session('uid'));

		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);
		$pagination->setPath('tickets');

		$this->data['rowData'] = $results['rows'];
		// Build Pagination
		$this->data['pagination'] = $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] = $this->injectPaginate();
		// Row grid Number
		$this->data['i'] = ($page * $params['limit']) - $params['limit'];
		// Grid Configuration
		$this->data['tableGrid'] = $this->info['config']['grid'];
		$this->data['tableForm'] = $this->info['config']['forms'];
		$this->data['colspan'] = \SiteHelpers::viewColSpan($this->info['config']['grid']);
		// Group users permission
		$this->data['access'] = $this->access;
		// Detail from master if any
		$this->data['fields'] = \SiteHelpers::fieldLang($this->info['config']['grid']);
		// Master detail link if any
		$this->data['subgrid'] = (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());

		$this->data['insort'] = $sort;
		$this->data['inorder'] = $order;

		// Render into template
		return view('tickets.index', $this->data);
	}

	function getUpdate(Request $request, $id = null) {
		// Make Sure users Logged
		if (!\Auth::check()) {
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext', 'You are not login');
		}

		$this->access = $this->model->validAccess($this->info['id'], session('gid'));
		if ($id == '') {
			if ($this->access['is_add'] == 0) {
				return redirect('dashboard')->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus', 'error');
			}

		}

		if ($id != '') {
			if ($this->access['is_edit'] == 0) {
				return redirect('dashboard')->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus', 'error');
			}

		}

		$row = $this->model->find($id);
		if ($row) {
			$this->data['row'] = $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('tickets');
		}
		$this->data['fields'] = \SiteHelpers::fieldLang($this->info['config']['forms']);

		$this->data['id'] = $id;
		return view('tickets.form', $this->data);
	}

	public function getShow(Request $request, $id = null) {
		// Make Sure users Logged
		if (!\Auth::check()) {
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext', 'You are not login');
		}

		$this->access = $this->model->validAccess($this->info['id'], session('gid'));
		if ($this->access['is_detail'] == 0) {
			return redirect('dashboard')->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus', 'error');
		}

		$row = $this->model->getRow($id);
		if ($row) {
			$this->data['row'] = $row;
			$this->data['fields'] = \SiteHelpers::fieldLang($this->info['config']['grid']);
			$this->data['id'] = $id;
			$this->data['access'] = $this->access;
			$this->data['subgrid'] = (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array());
			$this->data['fields'] = \SiteHelpers::fieldLang($this->info['config']['grid']);
			$this->data['prevnext'] = $this->model->prevNext($id);
			return view('tickets.view', $this->data);
		} else {
			return Redirect::to('tickets')->with('messagetext', 'Record Not Found !')->with('msgstatus', 'error');
		}
	}

	function postCopy(Request $request) {
		// Make Sure users Logged
		if (!\Auth::check()) {
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext', 'You are not login');
		}

		$this->access = $this->model->validAccess($this->info['id'], session('gid'));
		if ($this->access['is_add'] == 0) {
			return redirect('dashboard')->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus', 'error');
		}

		foreach (\DB::select("SHOW COLUMNS FROM tickets ") as $column) {
			if ($column->Field != 'id') {
				$columns[] = $column->Field;
			}

		}

		if (count($request->input('ids')) >= 1) {
			$toCopy = implode(",", $request->input('ids'));
			$sql = "INSERT INTO tickets (" . implode(",", $columns) . ") ";
			$sql .= " SELECT " . implode(",", $columns) . " FROM tickets WHERE id IN (" . $toCopy . ")";
			\DB::select($sql);
			return Redirect::to('tickets')->with('messagetext', \Lang::get('core.note_success'))->with('msgstatus', 'success');
		} else {

			return Redirect::to('tickets')->with('messagetext', 'Please select row to copy')->with('msgstatus', 'error');
		}

	}

	function postSave(Request $request) {
		// Make Sure users Logged
		if (!\Auth::check()) {
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext', 'You are not login');
		}

		if (session()->get('gid') == 4 || session()->get('gid') == 3) {
			$rules = [
				'categorias_id' => 'required',
				'incidencia'    => 'required',
				'usuario_id'    => 'required',
				'estado' 	    => 'required'
			];
		} else {
			$rules = $this->validateForm();
		}

		$rules['equipos_id'] = '';

		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			$data = $this->validatePost($request);
			$data['entry_by'] = auth()->user()->id;

			if ($request->input('id') == null)
            {
                if (auth()->user()->id != $data['usuario_id'])
                {
                    $data['tipo'] = 'Telefonico';
                }
                else
                {
                    $data['tipo'] = 'App';
                }
            }
			
			$id = $this->model->insertRow($data, $request->input('id'));

            $data['ticket_informer'] = $this->dataService->getUserById($data['entry_by']);

            $data['tecnico_id'] = '';

			if(!empty($data['tecnico_id']))
            {
                $to = $this->dataService->getTechnicalsById($data['tecnico_id'])->email;
                $data['ticket_owner'] = $this->dataService->getUserById($data['tecnico_id']);
                Mail::to($to)->send(new Ticket($data));
            }
            else
            {

                $to = '';

                if($data['ticket_informer']->group_id == 3)
                {
                    $to = $this->dataService->getAdmins()->pluck('email')->toArray();
                }
                else
                {
                    $to = $this->dataService->getTechnicals()->pluck('email')->toArray();
                }

                $data['ticket_owner'] = '';

                Mail::to($to)->send(new Ticket($data));
            }

			if (!is_null($request->input('apply'))) {
				$return = 'tickets/update/' . $id . '?return=' . self::returnUrl();
			} else {
				$return = 'tickets?return=' . self::returnUrl();
			}

			// Insert logs into database
			if ($request->input('id') == '') {
				\SiteHelpers::auditTrail($request, 'New Data with ID ' . $id . ' Has been Inserted !');
			} else {
				\SiteHelpers::auditTrail($request, 'Data with ID ' . $id . ' Has been Updated !');
			}

			return Redirect::to($return)->with('messagetext', \Lang::get('core.note_success'))->with('msgstatus', 'success');

		} else {

			return Redirect::to('tickets/update/' . $request->input('id'))->with('messagetext', \Lang::get('core.note_error'))->with('msgstatus', 'error')
				->withErrors($validator)->withInput();
		}

	}

	public function postDelete(Request $request) {
		// Make Sure users Logged
		if (!\Auth::check()) {
			return redirect('user/login')->with('msgstatus', 'error')->with('messagetext', 'You are not login');
		}

		$this->access = $this->model->validAccess($this->info['id'], session('gid'));
		if ($this->access['is_remove'] == 0) {
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus', 'error');
		}

		// delete multipe rows
		if (count($request->input('ids')) >= 1) {
			$this->model->destroy($request->input('ids'));

			\SiteHelpers::auditTrail($request, "ID : " . implode(",", $request->input('ids')) . "  , Has Been Removed Successfull");
			// redirect
			return Redirect::to('tickets')
				->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus', 'success');

		} else {
			return Redirect::to('tickets')
				->with('messagetext', 'No Item Deleted')->with('msgstatus', 'error');
		}

	}

	public static function display() {
		$mode = isset($_GET['view']) ? 'view' : 'default';
		$model = new Tickets();
		$info = $model::makeInfo('tickets');

		$data = array(
			'pageTitle' => $info['title'],
			'pageNote' => $info['note'],

		);

		if ($mode == 'view') {
			$id = $_GET['view'];
			$row = $model::getRow($id);
			if ($row) {
				$data['row'] = $row;
				$data['fields'] = \SiteHelpers::fieldLang($info['config']['grid']);
				$data['id'] = $id;
				return view('tickets.public.view', $data);
			}

		} else {

			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$params = array(
				'page' => $page,
				'limit' => (isset($_GET['rows']) ? filter_var($_GET['rows'], FILTER_VALIDATE_INT) : 10),
				'sort' => 'id',
				'order' => 'asc',
				'params' => '',
				'global' => 1,
			);

			$result = $model::getRows($params);
			$data['tableGrid'] = $info['config']['grid'];
			$data['rowData'] = $result['rows'];

			$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
			$pagination = new Paginator($result['rows'], $result['total'], $params['limit']);
			$pagination->setPath('');
			$data['i'] = ($page * $params['limit']) - $params['limit'];
			$data['pagination'] = $pagination;
			return view('tickets.public.index', $data);
		}

	}

	function postSavepublic(Request $request) {

		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			$data = $this->validatePost($request);
			$this->model->insertRow($data, $request->input('id'));
			return Redirect::back()->with('messagetext', '<p class="alert alert-success">' . \Lang::get('core.note_success') . '</p>')->with('msgstatus', 'success');
		} else {

			return Redirect::back()->with('messagetext', '<p class="alert alert-danger">' . \Lang::get('core.note_error') . '</p>')->with('msgstatus', 'error')
				->withErrors($validator)->withInput();

		}

	}

}