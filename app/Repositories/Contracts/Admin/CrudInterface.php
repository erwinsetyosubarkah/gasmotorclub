<?php

namespace App\Repositories\Contracts\Admin;

/**
 * Summary of CrudInterface
 */
interface CrudInterface
{
    /**
     * Summary of all
     * @return array
     */
    public function all();

    /**
     * Summary of store
     * @param array $data
     * @param object $request
     * @return array
     */
    public function store(array $data, object $request);

    /**
     * Summary of destroy
     * @param object $data
     * @return array
     */
    public function destroy(object $data);

    /**
     * Summary of showEdit
     * @param object $data
     * @return array
     */
    public function showEdit(object $data);

    /**
     * Summary of edit
     * @param array $data
     * @param object $obj
     * @param object $request
     * @return array
     */
    public function edit(array $data, object $obj, object $request);
}
