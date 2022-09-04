---
extends: _layouts.post
section: content
title: Unique binary search trees II
problemUrl: https://leetcode.com/problems/unique-binary-search-trees-ii/
date: 2022-09-04
categories: [dynamic-programming]
---

We will take the top-down approach to solve the problem. We will start from 1 and for every position, we take is as root, and build a tree with the left and right subarray for that root position, then create a tree with the values and add that tree to our result. Finally we will memoize it so reduce duplicate calculations.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def generateTrees(self, n: int) -> List[Optional[TreeNode]]:
        def buildTree(left, right, memo):
            if (left, right) in memo:
                return memo[(left, right)]
            
            if left == right:
                return [TreeNode(left)]
            if left > right:
                return [None]
            
            res = []
            for mid in range(left, right+1):
                leftTrees = buildTree(left, mid-1, memo)
                rightTrees = buildTree(mid+1, right, memo)
                
                for l in leftTrees:
                    for r in rightTrees:
                        root = TreeNode(mid)
                        root.left = l
                        root.right = r
                        res.append(root)
            
            memo[(left, right)] = res
            return memo[(left, right)]
                
        return buildTree(1, n, {})
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`