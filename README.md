## Usage

```php

<?php

$data = array();

$data[] = array(
  'label' => 'Project 1',
  'start' => '2012-04-20', 
  'end'   => '2012-05-12'
);

$data[] = array(
  'label' => 'Project 2',
  'start' => '2012-04-22', 
  'end'   => '2012-05-22', 
  'class' => 'important',
);

$data[] = array(
  'label' => 'Project 3',
  'start' => '2012-05-25', 
  'end'   => '2012-06-20'
  'class' => 'urgent',
);

$gantti = new Gantti($data, array(
  'title'      => 'Demo',
  'cellwidth'  => 25,
  'cellheight' => 35
));

echo $gantti->render();

?>

```

## Data

Data is defined as an associative array (see the example above).

For each project you get the following options:

- label: The label will be displayed in the sidebar
- start: The start date. Must be in the following format: YYYY-MM-DD
- end: The end date. Must be in the following format: YYYY-MM-DD
- class: An optional class name. (available by default: important, urgent)


## Options

### title (optional, default: false)

Set an optional title for your gantt diagram here. 
It will be displayed in the upper left corner.

### cellwidth (optional, default: 40)

Set the width of all cells.

### cellheight (optional, default: 40)

Set the height of all cells.

### today (optional, default: true)

Show or hide the today marker. It will be displayed by default.