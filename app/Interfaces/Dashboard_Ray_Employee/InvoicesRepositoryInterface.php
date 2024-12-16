<?php

namespace App\Interfaces\Dashboard_Ray_Employee;

interface InvoicesRepositoryInterface
{
    public function index();
    public function edit($id);
    public function update($request,$id);
    public function completed_invoices();
    public function view_rays($id);


}
