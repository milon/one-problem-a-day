---
extends: _layouts.post
section: content
title: Push dominoes
problemUrl: https://leetcode.com/problems/push-dominoes/
date: 2022-09-27
categories: [two-pointers]
---

Any triplet that reaches the state `R.L` remains that state permanently. These changes occur to pairs that are not part of an `R.L`, `R.` -> `RR` an `.L` -> `LL`. To avoid the problem with the `R.L` state when we  address the `R.` -> `RR` and  `.L` -> `LL` changes, we replace each `R.L` with a dummy string (say, `xxx`). Then we perform the `R.` -> `RR`, `.L` -> `LL` replacements. Once the described actions are complete and no other replacements are occured, we replace the dummy `xxx` string with `R.L` and return as result.

```python
class Solution:
    def pushDominoes(self, dominoes: str) -> str:
        temp = ''
        
        while dominoes != temp:
            temp = dominoes
            dominoes = dominoes.replace('R.L', 'xxx')
            dominoes = dominoes.replace('R.', 'RR')
            dominoes = dominoes.replace('.L', 'LL')

        return  dominoes.replace('xxx', 'R.L')            
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`