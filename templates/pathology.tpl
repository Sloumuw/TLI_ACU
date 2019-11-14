{extends file='base.tpl'}

{block name="title"}TLI - Connexion{/block}

{block name="stylesheet" append}
    <link rel="stylesheet" type="text/css" href="../assets/css/pathology.css">
{/block}

{block name="content"}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <form action="/filter" method="post">
                    <label>Méridien
                        <select name="meridien">
                            <option value="0">-- Selectionnez un méridien --</option>
                            {foreach from=$meridiens item=meridien}
                                <option value="{$meridien->getId()}">{$meridien->getName()}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>Type de pathologie
                        <select name="category">
                            <option value="0">-- Selectionnez une categorie --</option>
                            {foreach from=$categories item=category}
                                <option value="{$category->getId()}">{$category->getName()}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>Caractéristiques
                        <select name="carac">
                            <option value="0">-- Selectionnez une caractéristique --</option>
                            {foreach from=$caracs item=carac}
                                <option value="{$carac->getId()}">{$carac->getName()}</option>
                            {/foreach}
                        </select>
                    </label>
                    <input type="submit" value="Filtrer" id="filter">
                </form>
            </div>
        </div>
    </div>
    {if $session }
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/keyword-filter" method="post">
                        <label>Recherche par mots clé
                            <select name="keyword">
                                <option value="0">-- Selectionnez un mot clé --</option>
                                {foreach from=$keywords item=keyword}
                                    <option value="{$keyword->getId()}">{$keyword->getName()}</option>
                                {/foreach}
                            </select>
                        </label>
                        <input type="submit" value="Filtrer" id="filter">
                    </form>
                </div>
            </div>
        </div>
    {/if}
    {if $pathologies !== null}
        <div class="card">
            <div class="card-header">Pathologies</div>
            <div class="card-body">
                <div class="row">
                    <table>
                        <thead>
                            <tr>
                                {foreach from=$headers item=header}
                                    <th>{$header}</th>
                                {/foreach}
                            </tr>
                        </thead>
                        <tbody>
                        {foreach from=$pathologies item=pathologie}
                            <tr>
                                <td>{$pathologie->getCatName()}</td>
                                <td>{$pathologie->getCaracName()}</td>
                                <td>{$pathologie->getMeridienName()}</td>
                                <td>{$pathologie->getDescription()}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {/if}
{/block}

{block name="script" append}
    <script src="../assets/js/pathology.js"></script>
{/block}
