---
extends: _layouts.post
section: content
title: Path sum III
problemUrl: https://leetcode.com/problems/path-sum-iii/
date: 2022-11-15
categories: [dynamic-programming, backtracking, tree]
---

We will use dfs to traverse the tree and for each node, we will find the number of paths that start from the current node and have the sum equal to the target sum. We will use a hashmap to store the prefix sum and the number of times it has occurred. For each node, we will add the current node's value to the prefix sum and check if the prefix sum minus the target sum has occurred before. If it has, then we will add the number of times it has occurred to the result. We will then recursively call the function for the left and right child. After the recursive calls, we will remove the current node's value from the prefix sum and return the result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def pathSum(self, root: TreeNode, targetSum: int) -> int:
        def dfs(node: TreeNode, prefixSum: int, memo: dict) -> int:
            if not node:
                return 0
            prefixSum += node.val
            res = memo.get(prefixSum-targetSum, 0)
            memo[prefixSum] = memo.get(prefixSum, 0) + 1
            res += dfs(node.left, prefixSum, memo) + dfs(node.right, prefixSum, memo)
            memo[prefixSum] -= 1
            return res
        
        return dfs(root, 0, {0: 1})
```

Time complexity: `O(n)` <br>
Space complexity: `O(n)`