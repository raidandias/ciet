<?php

class SelectFild {

    public function select(?array $data, string $name, $label = "Label"): void
    {
        echo "<label>{$label}:</label>";
        echo "<select name='{$name}' id='car'>";
             foreach ($data as $value => $legend) {
                echo "<option value='{$value}'>{$legend}</option>";
            }
        echo "</select>";
    }
}