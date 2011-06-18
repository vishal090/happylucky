<?php 

/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';
/**
 * This is based on PHPExcel library to simplify the basic function used.
 * This is not a report template, so the template you have to create yourself.
 * 
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license 
 */
class XLSReport {
    private var $this->_title;
    private var $this->_file_name;
    private var $this->_columns_count;
    private var $this->_auto_fit_width;

    /**
     * __construct 
     * 
     * @param mixed $title 
     * @return void
     */
    public function __construct(array $report_metadata) {
        $this->_title          = $report_metadata['title'];
        $this->_file_name      = $report_metadata['file_name'];
        $this->_columns_count  = $report_metadata['columns_count'];
        $this->_auto_fit_width = $report_metadata['auto_fit_width'];
        $this->xls             = new PHPExcel();
    }

    /**
     * Send the file to the user to download 
     * 
     * @return void
     */
    public function send_file($force_download = false) {
        $path_filename = HOME_PATH . '/../data/reports/' . $this->_filename();
        
        $this->_build();
        $writer = PHPExcel_IOFactory::createWriter($this->xls, "Excel5");
        $ret    = $writer->save($path_filename);
        @ob_end_clean(); 
        if ( $force_download )
            $this->_force_download("../data/reports/".$this->_filename());
    }

    /**
     * _force_download 
     * 
     * @param mixed $path 
     * @return void
     */
    private function _force_download( $path ) {
        header("Location:".$path);
    }
	
    /**
     * merge_cell 
     * 
     * @param mixed $from_pos 
     * @param mixed $to_pos 
     * @return void
     */
	public function merge_cell( $from_pos, $to_pos ) {
        $position_range = $from_pos . ":" . $to_pos;
		$sheet = $this->xls->getActiveSheet();
		$sheet->mergeCells($position_range);
		$sheet->getStyle($position_range)->getAlignment()->setWrapText(true);
	}

    /**
     * Filename to be saved and export for download 
     * 
     * @return string
     */
    private function _filename() {
        if($this->_file_name) {
                $filename = str_replace(' ', '_', $this->_file_name);
            if($this->_get_file_name_extension($filename) != 'xls')
                $filename .= ".xls";
        }
        else {
            $tmp = strtolower($this->_title) . "_printed_on_(" . date("j-M-Y") . ")";
            $filename = str_replace(' ', '_', $tmp) . ".xls";
        }
        return $filename;
    }

    /**
     * Create the excel file 
     * 
     * @return void
     */
    private function _build() {
        $this->xls->setActiveSheetIndex(0);
        $this->_set_metadata();
        $this->_build_title();
    }

    /**
     * Build the Title of the excel worksheet
     * 
     * @return void
     */
    private function _build_title() {
		$sheet = $this->xls->getActiveSheet();
        
		$sheet->setCellValue('A1', $this->_title);

        // auto fit the column width
        if($this->_auto_fit_width) // from column 1 to last column
            $this->_set_auto_fit_width(1, $this->_columns_count);

		// merge cells
        $end_position = $this->find_position(1, $this->_columns_count);
		$this->merge_cell('A1', $end_position);
    }


    // /**
     // * Generate the list from the report model.
     // * 
     // * @return void
     // */
    // private function _build_list() {
		// $rs = $this->report_model['row'];
		// $sheet = $this->xls->getActiveSheet();
        // $r = 2; // row count
        // foreach ( $rs as $key => $row )
        // {
			// $c = 0; // column count
            // foreach ( $row as $value )
            // {
                // $sheet->setCellValueByColumnAndRow($c, $r, $value);
				// $sheet->getStyle($position)->getAlignment()->setWrapText(true);
				// $c++;
            // }
            // $r++;
        // }
        // 
    // }
	
    /**
     * Set the excel file document's properties 
     * 
     * @return void
     */
    private function _set_metadata() {
        $this->xls->getProperties()->setCreator($creator);
        // $this->xls->getproperties()->setlastmodifiedby($last_modified_by);
        $this->xls->getProperties()->setTitle($this->_title);
        $this->xls->getProperties()->setSubject($this->_title);
        $this->xls->getProperties()->setKeywords("Report");
        $this->xls->getProperties()->setCategory("Standard Report");
    }

    /**
     * set_font_size 
     * 
     * @param mixed $position 
     * @param mixed $size 
     * @return void
     */
    public function set_font_size($position, $size) {
		$sheet = $this->xls->getActiveSheet();
		$sheet->getStyle($position)->getFont()->setSize($size);
    }
	
    /**
     * set_bold 
     * 
     * @param mixed $position 
     * @return void
     */
	public function set_bold($position) {
        $style_array = array('font' => array('bold' => true));
		$this->xls->getActiveSheet()
			->getStyle($position)->applyFromArray($style_array);
	}
	
    /**
     * set_italic 
     * 
     * @param mixed $position 
     * @return void
     */
	public function set_italic($position) {
		$style_array = array('font' => array('italic' => true));
		$this->xls->getActiveSheet()
			->getStyle($position)->applyFromArray($style_array);
	}
	
	/*
	Just for Reference
	const BORDER_NONE = 'none';
	const BORDER_DASHDOT = 'dashDot';
	const BORDER_DASHDOTDOT = 'dashDotDot';
	const BORDER_DASHED = 'dashed';
	const BORDER_DOTTED = 'dotted';
	const BORDER_DOUBLE = 'double';
	const BORDER_HAIR = 'hair';
	const BORDER_MEDIUM = 'medium';
	const BORDER_MEDIUMDASHDOT = 'mediumDashDot';
	const BORDER_MEDIUMDASHDOTDOT = 'mediumDashDotDot';
	const BORDER_MEDIUMDASHED = 'mediumDashed';
	const BORDER_SLANTDASHDOT = 'slantDashDot';
	const BORDER_THICK = 'thick';
	const BORDER_THIN = 'thin';
	*/
	public function set_border($position, $border_type) {
		$style_array = array('borders' => array('allborders' => array
					    ('style' => $border_type)));
		$this->xls->getActiveSheet()
			->getStyle($position)->applyFromArray($style_array);
	}

    /**
     * Passed in column can either integer or character
     * i.e. set_auto_fit_width(1, 5) same as set_auto_fit_width('A', 'E') 
     * 
     * @param mixed $from_col 
     * @param mixed $to_col 
     * @return void
     */
	private function _set_auto_fit_width($from_col, $to_col) {
	    if(is_int($from_col))
	        $from_col = $this->_find_column_position($from_col);
	    if(is_int($to_col))
	        $to_col = $this->_find_column_position($to_col);
	    foreach ( range($from_col, $to_col) as $col )
        {
            $this->xls->getActiveSheet()
		        ->getColumnDimension($col)->setAutoSize(true);	
        }
    }

    /**
     * set_text 
     * 
     * @param mixed $position 
     * @param mixed $text 
     * @return void
     */
    public function set_text($position, $text) {
        $this->xls->getActiveSheet()
            ->getCell($position)
            ->setValueExplicit($text, PHPExcel_Cell_DataType::TYPE_STRING);
    }
	
    /**
     * set_bg_color 
     * 
     * @param mixed $position 
     * @param mixed $color 
     * @return void
     */
	public function set_bg_color($position,$color) {
		$sheet = $this->xls->getActiveSheet();
		$sheet->getStyle($position)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$sheet->getStyle($position)->getFill()->getStartColor()->setRGB($color);
	}
	
    /**
     * set_font_color 
     * 
     * @param mixed $position 
     * @param mixed $color 
     * @return void
     */
	public function set_font_color($position, $color) {
		$sheet = $this->xls->getActiveSheet();
		$sheet->getStyle($position)->getFont()->getColor()
            ->setARGB($color);
	}

    /**
     * find_position 
     * 
     * Excel column start from one (1) from users' perpective,
     * so A - 1, Z - 26
     *
     * @param integer $column 
     * @param integer $row 
     * @return string
     */
    public function find_position($column, $row) {
        // _find_column_position() is start from 1, thus plus 1
        return $this->_find_column_position($column+1) . $row;
    }

    /**
     * _find_column_position 
     * 
     * @param mixed $num 
     * @return void
     */
    private function _find_column_position($num) {  
        $arr = $this->_to_base_26($num);
        $result = "";
        foreach ( $arr as $v )
        {
            $result .= chr(64 + $v);
        }
        return $result;
    }

    /**
     * to_base_26 
     * 
     * @param mixed $num 
     * @return void
     */
    private function _to_base_26($num) {
        $result_arr = array();
        while ( $num > 0 )
        {
            $result_arr[] = $num % 26;
            $num = floor($num / 26);
        }
        return array_reverse($result_arr);
    }

    /**
     * _get_file_name_extension 
     * 
     * @param mixed $filename 
     * @return void
     */
    private function _get_file_name_extension($filename) {
        $arr = explode('.', $filename);
        $arr_size = count($filename);

        return ($arr_size > 0) ? false : $arr[$arr_size-1];
    }
}
