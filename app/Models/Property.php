<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Property extends Model
{
    use HasFactory;
    protected $table = 'project_props';
    protected $fillable = [
        "PREDICTION",
        "OverallQual",
        "Neighborhood",
        "GrLivArea",
        "GarageCars",
        "BsmtQual",
        "ExterQual",
        "GarageArea",
        "KitchenQual",
        "YearBuilt",
        "TotalBsmtSF",
        "FirstFlrSF",
        "GarageFinish",
        "FullBath",
        "YearRemodAdd",
        "GarageType",
        "FireplaceQu",
        "Foundation",
        "MSSubClass",
        "TotRmsAbvGrd",
        "Fireplaces",
        "user_id",
        "project_id",
    ];
    public function  scopeSelection($query)
    {

        return $query->select(        
            "PREDICTION",
            "OverallQual",
            "Neighborhood",
            "GrLivArea",
            "GarageCars",
            "BsmtQual",
            "ExterQual",
            "GarageArea",
            "KitchenQual",
            "YearBuilt",
            "TotalBsmtSF",
            "FirstFlrSF",
            "GarageFinish",
            "FullBath",
            "YearRemodAdd",
            "GarageType",
            "FireplaceQu",
            "Foundation",
            "MSSubClass",
            "TotRmsAbvGrd",
            "Fireplaces",
            "user_id",
            "project_id"
        );
    }
    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
