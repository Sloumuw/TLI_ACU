{extends file='base.tpl'}

{block name="title"}TLI - Projet{/block}

{block name="stylesheet" append}
    <link rel="stylesheet" type="text/css" href="../assets/css/project.css">
{/block}

{block name="content"}
        <h1>Informations sur notre projet</h1>
            <ul>
                <li>Technologies utilisées</li>
                    <div class="col-md-6">
                        <img src="https://cdn.iconscout.com/icon/free/png-256/docker-226091.png">
                        <div class="title text-left">
                            <p>Docker</p>
                        </div>
                        <div class="description">
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAD6CAMAAADTNPgKAAAAgVBMVEURERH////8/PwVFRUcHBwYGBjo6Oj39/f19fUaGhorKyvx8fEoKCgkJCQeHh7IyMjk5OSKiopJSUkzMzOdnZ3d3d20tLS9vb12dnbW1tZBQUFRUVFqamo5OTldXV1kZGRFRUWIiIimpqaUlJSrq6t8fHyXl5dYWFi5ublOTk7Dw8MJUIOwAAAGmUlEQVR4nO2cWZeqvBKGW1BARkHmSZm09f//wIN2r967t1RIRJN869Rz0XfY9ZKpknrDxweCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIMh/g42ZF3WZDkPTNMOQlnWR79eig2LDqYqh9SLNsgxdUZTVajX+1Q3L0nZZ79dHcys6QhqcOrzubsGDWFk85KroOImoVRrrJA1/0MLaFh0uxPrSRsSm+I2R+dVGdMwTbA4xg4rvThZeRIf9L+siMVhl3KW0co0WN7SekXEjGkQH/wf1ED0r48Y1EC3gG8d/ujm+G+UgxaC322UyRoxBgiXSvjJPVo/oofDkxY6XyxhRfMFKnNfoGJV0QsfJtqPMSOYxUpELyuFlOsa1sRCnI89ep2O18vbChCyfeP9GCUXpOL9Ux4igzuUkrxaSiNmizI50RfPituv8xu/C2CNvG78eKEXo2FxJMRlZX+a2s97cJ1V1s3bsqmyzGe2ZK0DIhZAqGn1tTj1jlgmxXYyat4qxQUIwHC2cVHFHLTySlJh/pmJDexDFK4i5rHki9C+L/1oSQLH0s1OPT9gVpzxi/x3N0zo+tj7cuxLuuSOwiFD1DcIKFPHuW+Z0mqU0VE9XO0gI93krnw5FozxI6MAmoXsTr6OYXkUyyiSjAs9d4vfG/cBherx6lLsjFVyFovfG/UA5HcaV9vkLJER/Z9QTpNNheNTJEjjcOWfAgJCoov0BcFOWvzPsR4CupVMn4iW0KHLeXdVAwpTRZn2B9vOMoluWpu2iLMs8j/dJMDD9jskS5bxl9knch50/pOWhPhfBMa/2puNyz1CABXHMUfinfYsAUpQRLRV+jsuCCm90lZbzxLMMOFtaKZqfS1HxoIJ8qLVrA6lqgwRscGn+JmoCEWcizGxnz0sV7docHfkbpqapRytZeBB3Nk2HS3kUr2tec65k7mVA3jjZMNFnVziiA4awPXolX92sO0jpPoF2iQT06OoHtnxinqorKFFbyjb+j09aN3QtSeUa/unzZgEtLiUa/Ztuie3BiM/SaHHY3WZ/Y3mpKcnSby4tJEY+XEzhik0s3FCgRI0cUvbEWiKVFE+g6eEv3HCxkUPvpWgUt9HmY53hKsdG7Lh0oIzrykEKJU6aLZVipRL4AUf23UKL5sqSxTjr+EtdT6kkebG6H7JFzaIJMD4ArM/tkhlsR12VeD9bs4xZLi38JpEmi7yxqdL4Kcv/iCwD/of1+eQ908k06S5ijOlkXvaRxdrLeJenKdkGacu2VCqy3F14YOtUac8wLfdSl1fMYkgotWjSV1c2ly6hGf++6EApcPI00eaGTCZH8jhLlc7k/JaEM/A0zvmTtF5Ser6kwC1JZ5Ryz1v/4PbwRj+S9vLrFM4JHCm62DPuNeN7dHtQCffRrrr2vjoWh6Hrr9kuYzw92IPjhJ8LRLXzomxO/aeX7YyfF8vaIxpICK8l8QSsaayXJkDTbPuWsB+BjJWsV4tAHzOvVH4A/r/HOm1CbyR5S9iPFMD/t1i3Eg3wQ9Re1YXsobWMNbeAmpaXEAc6iGO9WQTdeODVtdbQBV1Whz7ky+G2b2+gNZntZpEDlYh4Tb8fZygL15mSixzaL3LbI9rgjpWpSUBXDr/riOAtdoMhTXLAXOv4rrgfgB1OO+pioDpAs7jGr6AI9u6xc9EeQwfgbyT8bCou/IUEhfI7FBXo9lJ4ngcBlxVu6D7NcY4Lf7zDOL89/D9sSSdt7Xwfzwnuu4irAQrecd+cDDNG7M2ZVG08cZLwxZHoX9Y6UqNUJ9KxFnMOvQz42tpXo0T+cXrQu0FHPjSNOVvr8rnDdS1OHzfx+TB7js27sqsSbg7/sEv8tC4uQXAp6nIIPYrKgsdZB+k05ze6pY1YBl3dyhJQai9f+JmaH1oBNQX3td93uSPGMWAut2n9gz6I8ToVr1bSC/Jsqelrh4knzIqy8V+pRGQ9d0v6NggjEc+s9wH39CodIlaQXzRLLYBfZEfBOj625QvmLuUqXMfHzSy7VIfeymE4M5c5mJWslsbscF5gkDdCmW4qqfX1uYlY62WSccOur8x2OX0XAhtJoWyCjslfalwn9pByoNqX0Jv1Md1FRJ+SXXx7wAnSua+V7z6b814S+/gM62Pp3+wEkWbp90/56+OON8q8z74rL3KsGfTcDR75MQgul0sQBHle7W1XiksiCIIgCIIgCIIgCIIgCIIgCIIgCIIgCIIgCIIgCIIgCIIgCIIg/0f8D8pSY8AWg8DCAAAAAElFTkSuQmCC">
                        <div class="title text-left">
                            <p>Skeleton CSS</p>
                        </div>
                        <div class="description">
                            <p>N'ayant pas l'autorisation d'utiliser un framework CSS tel que Bootstrap, nous avons eu recours à Skeleton. Cet outil est bien adapté à notre projet car il est conçu pour les petits projets n'ayant pas besoin de tous les avantages des frameworks plus grands. Skeleton ne met en forme qu'une poignée d'éléments HTML standard et inclut une grille.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/images/html.png">
                        <div class="title text-left">
                            <p>HTML5</p>
                        </div>
                        <div class="description">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/images/css (copy).png">
                        <div class="title text-left">
                            <p>CSS3</p>
                        </div>
                        <div class="description">
                            <p>Pour faire du style en feuilles cascadées</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/images/smarty.jpg">
                        <div class="title text-left">
                            <p>Smarty</p>
                        </div>
                        <div class="description">
                            <p>Le moteur et compilateur de templates PHP. Utiliser pour séparer la logique applicative et la présentation, c'est-à-dire séparer la programmation du design</p>
                        </div>
                    </div>
                <li>Sources</li>
                <ul>
                    <li><a hfref="https://www.smarty.net/">Smarty</li>
                    <li><a hfref="https://www.php.net/docs.php">PHP</li>
                    <li><a hfref="https://www.w3schools.com/">HTML/CSS</li>
                    </ul>
            </ul>
{/block}

{block name="script" append}
    <script src="../assets/js/projet.js"></script>
{/block}
