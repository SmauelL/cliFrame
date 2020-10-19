<?php
/**
 * User: liaojiaxing
 * Date: 2020/10/19 11:17 上午
 */

namespace CliFrame\Output\Helper;

use CliFrame\Output\OutputFilterInterface;

class TableHelper
{
    protected $table_rows;

    protected $styled_rows;

    protected $formatted_table;

    public function __construct(array $table = null)
    {
        if (is_array($table)) {
            $this->setTable($table);
        }
    }

    public function totalRows(): int
    {
        return count($this->table_rows);
    }

    public function addHeader(array $header, $style = 'alt'): void
    {
        $this->insertTableRow($header, $style);
    }

    public function setTable(array $full_table): void
    {
        $first = true;

        foreach ($full_table as $row) {
            if ($first) {
                $this->addHeader($row);
                $first = false;
                continue;
            }

            $this->addRow($row);
        }
    }

    public function addRow(array $row, $style = 'default'): void
    {
        $this->insertTableRow($row, $style);
    }

    public function getFormattedTable(OutputFilterInterface $filter = null)
    {
        $filter = $filter ?? new SimpleOutputFilter();

        foreach ($this->styled_rows as $index => $item) {
            $style = $item['style'];
            $row = $this->getRowAsString($item['row']);

            $this->formatted_table .= "\n" . $filter->filter($row, $style);
        }

        return $this->formatted_table;
    }

    protected function insertTableRow(array $row, $style = 'default')
    {
        $this->table_rows[] = $row;
        $this->styled_rows[] = ['row' => $row, 'style' => $style];
    }

    protected function calculateColumnSizes($min_col_size = 5): array
    {
        $column_sizes = [];

        foreach ($this->table_rows as $row_number => $row_content) {
            $column_count = 0;

            foreach ($row_content as $cell) {
                $column_sizes[$column_count] = $column_sizes[$column_count] ?? $min_col_size;
                if (strlen($cell) >= $column_sizes[$column_count]) {
                    $column_sizes[$column_count] = strlen($cell) + 2;
                }
                $column_count++;
            }
        }

        return $column_sizes;
    }

    protected function getRowAsString(array $row, $col_size = 5): string
    {
        $column_sizes = $this->calculateColumnSizes();

        $formatted_row = "";

        foreach ($row as $column => $table_cell) {
            $formatted_row .= $this->getPaddedString($table_cell, $column_sizes[$column]);
        }

        return $formatted_row;
    }

    protected function getPaddedString($table_cell, $col_size = 5): string
    {
        return str_pad($table_cell, $col_size);
    }
}