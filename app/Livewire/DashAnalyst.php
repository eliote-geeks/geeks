<?php
namespace App\Livewire;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
    use App\Models\User;
    use App\Models\Expense;
    use Asantibanez\LivewireCharts\Models\AreaChartModel;
    use Asantibanez\LivewireCharts\Models\ColumnChartModel;
    use Asantibanez\LivewireCharts\Models\LineChartModel;
    use Asantibanez\LivewireCharts\Models\PieChartModel;
    use Livewire\Component;
    
    class DashAnalyst extends Component 
 {
    public function diagram()
    {
       $data = collect();
    }

    public function render()   
    {
        
    //  $data['lineChart'] = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
    //  ->whereYear('created_at', date('Y'))
    //  ->groupBy('month_name')
    //  ->orderBy('createdAt')
    //  ->get();

   //  $record = User::select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
   //  ->where('created_at', '>', Carbon::today()->subDay(6))
   //  ->groupBy('day_name','day')
   //  ->orderBy('day')
   //  ->get();
  
   //   $data = [];
 
   //   foreach($record as $row) {
   //      $data['label'][] = $row->day_name;
   //      $data['data'][] = (int) $row->count;
   //    }
 
   //  $data['chart_data'] = json_encode($data);

   // $categories = Category::with("products", "sales")->get();
   $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
   ->whereYear('created_at', date('Y'))
   ->groupBy(DB::raw("Month(created_at)"))
   ->pluck('count', 'month_name');
   
      
    return view('livewire.dash-analyst',['categories' => $categories = Category::with("courses","orders")->get(),
                                          //'users' => User::where('user_type','App\Models\Student')->with('orders')->get(),                                          
                                          'users' => $users,
                                          'data' => $this->diagram(),
   ]);
    }
 }