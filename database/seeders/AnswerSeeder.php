<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('answers')->insert([

            // Answer choice question Laravel CRUD
            [
                'id'          => 1,
                'name'        => 'Create, Read, Undo, Delete',
                'is_true'     => 0,
                'question_id' => 1,
            ],
            [
                'id'          => 2,
                'name'        => 'Control, Return, Update, Display',
                'is_true'     => 0,
                'question_id' => 1,
            ],
            [
                'id'          => 3,
                'name'        => 'Code, Render, Utilize, Define',
                'is_true'     => 0,
                'question_id' => 1,
            ],
            [
                'id'          => 4,
                'name'        => 'Create, Read, Update, Delete',
                'is_true'     => 1,
                'question_id' => 1,
            ],

            // Answer choice of quiz in Laravel HTTPS
            [
                'id'          => 5,
                'name'        => 'GET, POST, CREATE, DELETE',
                'is_true'     => 0,
                'question_id' => 2,
            ],
            [
                'id'          => 6,
                'name'        => 'READ, PUT, PATCH, DELETE',
                'is_true'     => 0,
                'question_id' => 2,
            ],
            [
                'id'          => 7,
                'name'        => 'GET, POST, PUT, DELETE ',
                'is_true'     => 1,
                'question_id' => 2,
            ],
            [
                'id'          => 8,
                'name'        => 'FETCH, INSERT, MODIFY, REMOVE',
                'is_true'     => 0,
                'question_id' => 2,
            ],

            // Answer choice of quiz in Laravel create CRUD
            [
                'id'          => 9,
                'name'        => 'Using GET request',
                'is_true'     => 0,
                'question_id' => 3,
            ],
            [
                'id'          => 10,
                'name'        => 'Utilizing DELETE method',
                'is_true'     => 0,
                'question_id' => 3,
            ],
            [
                'id'          => 11,
                'name'        => 'Sending a POST request',
                'is_true'     => 1,
                'question_id' => 3,
            ],
            [
                'id'          => 12,
                'name'        => 'Issuing a PUT request',
                'is_true'     => 0,
                'question_id' => 3,
            ],

            // Answer choice of quiz in Laravel purpose Migration
            [
                'id'          => 13,
                'name'        => 'To manage user sessions',
                'is_true'     => 0,
                'question_id' => 4,
            ],
            [
                'id'          => 14,
                'name'        => 'To handle front-end styling',
                'is_true'     => 0,
                'question_id' => 4,
            ],
            [
                'id'          => 15,
                'name'        => 'To manage database schema changes',
                'is_true'     => 1,
                'question_id' => 4,
            ],
            [
                'id'          => 16,
                'name'        => 'To perform API authentication',
                'is_true'     => 0,
                'question_id' => 4,
            ],

            // Answer choice of quiz in Laravel create Migration file
            [
                'id'          => 17,
                'name'        => 'Using artisan make:model command',
                'is_true'     => 0,
                'question_id' => 5,
            ],
            [
                'id'          => 18,
                'name'        => 'Executing php artisan new:migration command',
                'is_true'     => 0,
                'question_id' => 5,
            ],
            [
                'id'          => 19,
                'name'        => 'Running php artisan create:migration command',
                'is_true'     => 0,
                'question_id' => 5,
            ],
            [
                'id'          => 20,
                'name'        => 'Using php artisan make:migration command',
                'is_true'     => 1,
                'question_id' => 5,
            ],

            // Answer choice of quiz in Laravel command execution all pending migration
            [
                'id'          => 21,
                'name'        => 'php artisan migrate:undo',
                'is_true'     => 0,
                'question_id' => 6,
            ],
            [
                'id'          => 22,
                'name'        => 'php artisan migrate:refresh',
                'is_true'     => 0,
                'question_id' => 6,
            ],
            [
                'id'          => 23,
                'name'        => 'php artisan run:migrations',
                'is_true'     => 0,
                'question_id' => 6,
            ],
            [
                'id'          => 24,
                'name'        => 'php artisan migrate',
                'is_true'     => 1,
                'question_id' => 6,
            ],

            // Answer choice of quiz in Laravel for MVC
            [
                'id'          => 25,
                'name'        => 'Model-View-Component',
                'is_true'     => 0,
                'question_id' => 7,
            ],
            [
                'id'          => 26,
                'name'        => 'Model-View-Criteria',
                'is_true'     => 0,
                'question_id' => 7,
            ],
            [
                'id'          => 27,
                'name'        => 'Model-Viewer-Controller',
                'is_true'     => 0,
                'question_id' => 7,
            ],
            [
                'id'          => 28,
                'name'        => 'Model-View-Controller',
                'is_true'     => 1,
                'question_id' => 7,
            ],

            // Answer choice of quiz in Laravel for MVC role
            [
                'id'          => 29,
                'name'        => 'Handles user interface presentation',
                'is_true'     => 0,
                'question_id' => 8,
            ],
            [
                'id'          => 30,
                'name'        => 'Manages routing and HTTP requests',
                'is_true'     => 0,
                'question_id' => 8,
            ],
            [
                'id'          => 31,
                'name'        => 'Responsible for database interactions and business logic',
                'is_true'     => 1,
                'question_id' => 8,
            ],
            [
                'id'          => 32,
                'name'        => 'Controls the layout and design of the application',
                'is_true'     => 0,
                'question_id' => 8,
            ],

            // Answer choice of quiz in Laravel for MVC View represent
            [
                'id'          => 33,
                'name'        => 'Manages data validation',
                'is_true'     => 0,
                'question_id' => 9,
            ],
            [
                'id'          => 34,
                'name'        => 'Handles database interactions',
                'is_true'     => 0,
                'question_id' => 9,
            ],
            [
                'id'          => 35,
                'name'        => 'Presents the user interface to the user',
                'is_true'     => 1,
                'question_id' => 9,
            ],
            [
                'id'          => 36,
                'name'        => 'Controls application flow and logic',
                'is_true'     => 0,
                'question_id' => 9,
            ],

            // Answer choice of quiz in JAVA CRUD
            [
                'id'          => 37,
                'name'        => 'Create, Reroute, Update, Dismiss',
                'is_true'     => 0,
                'question_id' => 10,
            ],
            [
                'id'          => 38,
                'name'        => 'Compile, Return, Utilize, Deploy',
                'is_true'     => 0,
                'question_id' => 10,
            ],
            [
                'id'          => 39,
                'name'        => 'Create, Retrieve, Update, Delete',
                'is_true'     => 1,
                'question_id' => 10,
            ],
            [
                'id'          => 40,
                'name'        => 'Code, Read, Utilize, Debug',
                'is_true'     => 0,
                'question_id' => 10,
            ],

            // Answer choice of quiz in JAVA class involved in CRUD
            [
                'id'          => 41,
                'name'        => 'Scanner, FileReader, BufferedWriter, PrintWriter',
                'is_true'     => 0,
                'question_id' => 11,
            ],
            [
                'id'          => 42,
                'name'        => 'Runnable, Thread, ExecutorService, Callable',
                'is_true'     => 0,
                'question_id' => 11,
            ],
            [
                'id'          => 43,
                'name'        => 'Model, View, Controller, Repository',
                'is_true'     => 0,
                'question_id' => 11,
            ],
            [
                'id'          => 44,
                'name'        => 'Entity, DAO (Data Access Object), Service, Repository',
                'is_true'     => 1,
                'question_id' => 11,
            ],

            // Answer choice of quiz in JAVA purpose of CRUD
            [
                'id'          => 45,
                'name'        => 'To modify existing data in the database',
                'is_true'     => 0,
                'question_id' => 12,
            ],
            [
                'id'          => 46,
                'name'        => 'To delete data from the database',
                'is_true'     => 0,
                'question_id' => 12,
            ],
            [
                'id'          => 47,
                'name'        => 'To add new records or entities to the database',
                'is_true'     => 1,
                'question_id' => 12,
            ],
            [
                'id'          => 48,
                'name'        => 'To retrieve data from the database ',
                'is_true'     => 0,
                'question_id' => 12,
            ],

            // Answer choice of quiz in OOP JAVA
            [
                'id'          => 49,
                'name'        => 'A programming paradigm focusing only on functions',
                'is_true'     => 0,
                'question_id' => 13,
            ],
            [
                'id'          => 50,
                'name'        => 'A programming concept that concentrates solely on variables',
                'is_true'     => 0,
                'question_id' => 13,
            ],
            [
                'id'          => 51,
                'name'        => 'A programming approach centered around objects, classes, and their interactions',
                'is_true'     => 1,
                'question_id' => 13,
            ],
            [
                'id'          => 52,
                'name'        => 'A programming style that emphasizes only data structures',
                'is_true'     => 0,
                'question_id' => 13,
            ],

            // Answer choice of quiz in core princpiple OOP JAVA
            [
                'id'          => 53,
                'name'        => 'Inheritance, Polymorphism, Abstraction, Encapsulation',
                'is_true'     => 1,
                'question_id' => 14,
            ],
            [
                'id'          => 54,
                'name'        => 'Functions, Variables, Loops, Conditionals',
                'is_true'     => 0,
                'question_id' => 14,
            ],
            [
                'id'          => 55,
                'name'        => 'Interface, Class, Enum, Package',
                'is_true'     => 0,
                'question_id' => 14,
            ],
            [
                'id'          => 56,
                'name'        => 'Method Overloading, Method Overriding, Static Binding, Dynamic Binding',
                'is_true'     => 0,
                'question_id' => 14,
            ],

            // Answer choice of quiz class OOP JAVA
            [
                'id'          => 57,
                'name'        => 'A class is a collection of methods, and it is used to store data in OOP',
                'is_true'     => 0,
                'question_id' => 15,
            ],
            [
                'id'          => 58,
                'name'        => 'A class is a blueprint or template that defines the behavior and properties of objects, and it is used to create objects in OOP',
                'is_true'     => 1,
                'question_id' => 15,
            ],
            [
                'id'          => 59,
                'name'        => 'A class is a reserved keyword in Java used for conditional statements',
                'is_true'     => 0,
                'question_id' => 15,
            ],
            [
                'id'          => 60,
                'name'        => 'A class is a data type used for arithmetic operations in Java',
                'is_true'     => 0,
                'question_id' => 15,
            ],

            // Answer choice of quiz data structure in JAVA
            [
                'id'          => 61,
                'name'        => 'A class is a collection of methods, and it is used to store data in OOP',
                'is_true'     => 0,
                'question_id' => 16,
            ],
            [
                'id'          => 62,
                'name'        => 'A data structure in Java signifies a way to perform arithmetic operations',
                'is_true'     => 0,
                'question_id' => 16,
            ],
            [
                'id'          => 63,
                'name'        => 'A data structure in Java represents a way to organize and store data efficiently',
                'is_true'     => 1,
                'question_id' => 16,
            ],
            [
                'id'          => 64,
                'name'        => 'A data structure in Java refers to graphical user interface components',
                'is_true'     => 0,
                'question_id' => 16,
            ],
            
            // Answer choice of quiz built-in data structure in JAVA
            [
                'id'          => 65,
                'name'        => 'HashTable, Stack, Sequence, Tree',
                'is_true'     => 0,
                'question_id' => 17,
            ],
            [
                'id'          => 66,
                'name'        => 'Set, Map, List, Queue',
                'is_true'     => 1,
                'question_id' => 17,
            ],
            [
                'id'          => 67,
                'name'        => 'Array, Tuple, Heap, Hash ',
                'is_true'     => 0,
                'question_id' => 17,
            ],
            [
                'id'          => 68,
                'name'        => 'Vector, Dictionary, LinkedList, Graph',
                'is_true'     => 0,
                'question_id' => 17,
            ],

            // Answer choice of quiz difference between ArrayList and LinkedList in JAVA
            [
                'id'          => 69,
                'name'        => 'Both ArrayList and LinkedList implement the List interface in Java and have similar performance characteristics',
                'is_true'     => 0,
                'question_id' => 18,
            ],
            [
                'id'          => 70,
                'name'        => 'ArrayList is implemented as a resizable array, whereas LinkedList is implemented as a doubly linked list',
                'is_true'     => 1,
                'question_id' => 18,
            ],
            [
                'id'          => 71,
                'name'        => 'ArrayList is synchronized and thread-safe, while LinkedList is not synchronized',
                'is_true'     => 0,
                'question_id' => 18,
            ],
            [
                'id'          => 72,
                'name'        => 'ArrayList allows constant-time positional access, while LinkedList allows faster insertion and deletion at arbitrary positions',
                'is_true'     => 0,
                'question_id' => 18,
            ],
        ]);
    }
}
