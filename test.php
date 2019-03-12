<?php
/*
Plugin Name: Test
Plugin URI:  
Description: Add To do list to your WP
Version:     0.01
Author:      HAO
Author URI:  
Text Domain: none
Domain Path: /languages
License:     GPL2
 
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

 
function tdlist(){
	echo'<div class="container">
    <h1>TO DO LIST</h1>
     <form>
      <p>
      <h3>Add Item</h3> 
      <br>
      <input type="text" placeholder="What Do You Want To Do ???" name="item" class="item" id="item">
      <input type="button" name="" class="add" value="Add"></p>
    </form>
  <div class="task-list">
    <h3>Tasks List</h3>
    <center><button class="remove">Remove All</button></center>
    <ul class="table" >
    </ul>
  </div>
  </div>';
  
}

function tdlist_page() {
    add_menu_page(
        'TodoList',
        'TodoList',
        'manage_options',
        'test',
        'tdlist'
    );
}
add_action('admin_menu', 'tdlist_page');

function todo_init() {
    return tdlist_page();
}
add_shortcode('tdlist_page', 'todo_init');


function test_enqueue_scripts() {
    $path = sprintf('%s%s', plugins_url(), '/test/');
    wp_enqueue_style('test-css', $path . 'css/TodoList.css', false, '0.01');
    wp_enqueue_script("jquery");
    wp_enqueue_script("jquery-ui-sortable");
    wp_enqueue_script('test-js', $path . 'js/TodoList.js',array(), '0.0.1', true);
}
add_action('admin_enqueue_scripts', 'test_enqueue_scripts');
  
