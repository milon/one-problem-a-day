---
extends: _layouts.post
section: content
title: Find mode in binary search tree
problemUrl: https://leetcode.com/problems/find-mode-in-binary-search-tree/
date: 2022-11-15
categories: [tree]
---

We will use a hashmap to store the frequency of each node's value. We will then traverse the hashmap and return the keys with the maximum frequency.

```python
class Solution:
    def findMode(self, root: TreeNode) -> List[int]:
        freq = {}
        def dfs(node: TreeNode):
            if not node:
                return
            freq[node.val] = freq.get(node.val, 0) + 1
            dfs(node.left)
            dfs(node.right)

        dfs(root)
        maxFreq = max(freq.values())
        return [k for k, v in freq.items() if v == maxFreq]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`