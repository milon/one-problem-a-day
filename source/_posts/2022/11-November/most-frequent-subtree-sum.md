---
extends: _layouts.post
section: content
title: Most frequent subtree sum
problemUrl: https://leetcode.com/problems/most-frequent-subtree-sum/
date: 2022-11-15
categories: [tree]
---

First we will use DFS to find all the subtree sum and then use a hash map to store the frequency of each subtree sum. Then we can find the most frequent subtree sum.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findFrequentTreeSum(self, root: Optional[TreeNode]) -> List[int]:
        if not root:
            return []
        
        count = collections.Counter()
        
        def dfs(root: Optional[TreeNode]) -> int:
            if not root:
                return 0
            
            val = root.val + dfs(root.left) + dfs(root.right)
            count[val] += 1
            return val
        
        dfs(root)
        maxCount = max(count.values())
        return [c for c in count if count[c] == maxCount]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`