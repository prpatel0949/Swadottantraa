<?php
namespace App\Repository\Interfaces;

interface ProgramRepositoryInterface
{
    public function all();

    public function subscribe($request);

    public function findorfail($id);

    public function storeAnswer($data, $id);

    public function store($data);

    public function find($id);

    public function update($data, $id);

    public function destroy($id);

    public function scaleQuestionAnswer($data, $id);

    public function updateStatus($id);

    public function active();

    public function answers();

    public function answer($id);

    public function stageAccess($data, $id);

    public function getAccess($id, $user_id);

    public function copy($id);

    public function answerComment($data, $id);

    public function usersAnswers($step_id, $user_id);

    public function recommandProgram($data);

    public function allRecommandedProgram();

    public function findRecommandProgram($id);

    public function updateRecommandProgram($data, $id);

    public function getTopPrograms();
}