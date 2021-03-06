<?php


namespace TheCodingMachine\Graphqlite\Bundle\Tests\Fixtures\Entities;


use stdClass;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use TheCodingMachine\Graphqlite\Bundle\Tests\Fixtures\Controller\TestGraphqlController;
use TheCodingMachine\GraphQLite\Annotations\Autowire;

/**
 * @Type()
 */
class Contact
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @Field(name="name")
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @Field()
     * @Autowire(for="$testService")
     * @Autowire(for="$someService", identifier="someService")
     * @return string
     */
    public function injectService(TestGraphqlController $testService = null, stdClass $someService = null): string
    {
        if (!$testService instanceof TestGraphqlController || $someService === null) {
            return 'KO';
        }
        return 'OK';
    }
}
