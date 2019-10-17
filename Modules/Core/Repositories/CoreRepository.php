<?php

namespace Modules\Core\Repositories;

use Modules\Core\Entities\BaseModel;
use Modules\Vote\Entities\Vote;

class CoreRepository
{
    // model property on class instances
    protected $entity;

    // Constructor to bind model to repo
    public function __construct(BaseModel $entity)
    {
        $this->entity = $entity;
    }
/*
    public function votes() {
        return $this->entity->hasMany(Vote::class,'rel_id')->where('rel_type', get_class($this->entity));
    }*/

    public function __call($method, $parameters)
    {
        if (method_exists($this->entity, 'scope' . ucfirst($method))) {
            $this->entity = $this->entity->{$method}(...$parameters);

            return $this;
        }
        $this->entity = call_user_func_array([$this->entity, $method], $parameters);
        return $this;
    }

    public function __get($name)
    {
        if (method_exists($this, $name)) {
            return $this->{$name}();
        }

        if (isset($this->entity->{$name})) {
            return $this->entity->{$name};
        }

        return false;
    }
}