<?php 

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository {

    /** @var Employee */
    private $model = Employee::class;

    public function __construct() {}

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
}