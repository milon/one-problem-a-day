---
extends: _layouts.post
section: content
title: Path in zigzag labelled binary tree
problemUrl: https://leetcode.com/problems/path-in-zigzag-labelled-binary-tree/
date: 2022-11-16
categories: [tree]
---

We will use DFS for finding the path. We recursively find the path in the left and right subtrees and then return the root. If the root is in the set, we return the left and right subtrees, and if the root is not in the set, we return the root.

```python
class Solution:
    def pathInZigZagTree(self, label: int) -> List[int]:
        # using +0.000000001 to handle edge values
        # e.g : if log2(label) = 16 then total level will be 5
        level = ceil(log2(label)+0.000000001)
        
        max_value = 2**level-1
        min_value = 2**(level-1)
        
        res = []
        while label:
            res.append(label)
            label = (max_value-label+min_value)//2
            max_value = min_value-1
            min_value //= 2
        
        return reversed(res)
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(log(n))`