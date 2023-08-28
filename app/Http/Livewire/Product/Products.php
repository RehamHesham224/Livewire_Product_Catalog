<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
class Products extends Component
{
    use WithPagination;

    public $search='';
    public $category='';
    protected $updatesQueryString = ['search'];
    protected $cart;
    public $sql;
    public $perPage = 2;

    public function loadMore()
    {
        $this->perPage += 2;
    }
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->category = request()->query('category', $this->category);
    }
    public function render()
    {
        $categories=Category::all();
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        if ($this->category) {
            $query
                ->with('categories')
                ->whereHas('categories', function ($q) {
                $q->where('name', 'like', '%' . $this->category . '%');
            });
        }
        $products = $query->paginate($this->perPage);

        return view('livewire.product.products', [
            'products' => $products,
            'categories' => $categories
        ]);

    }
}


