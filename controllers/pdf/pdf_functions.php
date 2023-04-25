<?php

    class pdf_functions{

        function stringHeader($header)
        {
            $HeadHtml = '';
            foreach ($header as $value) {
                $HeadHtml = $HeadHtml . '<td style="witdh: auto" align="center"><small>' . $value . '</small></td>';
            }
            return $HeadHtml;
        }

        function stringBody($Body, $posicion)
        {
            $BodyHtml = '';

            for ($i = 0; $i < count($Body); $i++) {
                foreach ($Body[$i] as $key => $value) {
                    if ($key == 0) {
                        $BodyHtml = $BodyHtml . '<tr>';
                    }

                    if ($key != $posicion) {
                        if($key != 0){
                            $BodyHtml = $BodyHtml . '<td style="background-color: #e0f1f1;" align="center"><small style="padding: 8px; margin: 5px">' . $value . '</small></td>';
                        }
                    } else {
                        if($posicion == null){
                            $BodyHtml = $BodyHtml . '<td style="background-color: #e0f1f1;" align="center"><small style="padding: 8px; margin: 5px">' . $value . '</small></td>';
                        }else{
                            $BodyHtml = $BodyHtml . '<td style="background-color: #e0f1f1;" align="center"><a style="color: #292929;  text-decoration:none;" href="' . $value . '"><small>Ver perfil</small></a></td>';
                        }
                    }

                    if ($key == sizeof($Body[$i]) - 1) {
                        $BodyHtml = $BodyHtml . '</tr>';
                    }
                }
            }

            return $BodyHtml;
        }

    }

?>